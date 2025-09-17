<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    /*
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all(); // напрямую из БД, без Redis
        return view("posts.index", compact("posts"));
    }


    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:51200',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $data['image'] = $path;
        }

        Post::create($data);

        // Очистка кэша после создания
        Redis::del("post:all");

        return redirect()->route('posts.index');
    }


    /*
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $views = Redis::incr("post:{$id}:views");
        $post = Post::with('comments')->findOrFail($id);
        return view('posts.show', compact('post', 'views'));
    }

    /*
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:51200',
        ]);

        $post = Post::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // сохраняем новый файл
            $path = $request->file('image')->store('posts', 'public');
            $data['image'] = $path;
        } else {
            // если файл не загружен, оставляем старую картинку
            $data['image'] = $post->image;
        }

        $post->update($data);

        // очищаем кэш Redis, если используешь
        Redis::del("post:all");

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            Redis::del("post:all"); // вот это оставляем
            return redirect()->route('posts.index')->with('success', 'Пост удалён!');
        }

        return redirect()->route('posts.index')->with('error', 'Пост не найден!');
    }



}
