<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */




    public function index()
    {
        $posts = Post::all();
        return view("comments.index", compact("posts"));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $postId = $request->get('post_id');
        return view('comments.create', ['postId' => $postId]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'author' => 'required|string|max:255',
            'text' => 'required|string|max:500',
        ]);

        $data = $request->all();

        Comment::create($data);

        return redirect()->route('comments.index');
    }
    public function postComment(string $id)
    {
        $post = Post::findOrFail($id);
        $comments = Comment::where('post_id', $id)->get();
        return view('comments.show', compact('comments', 'post'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
