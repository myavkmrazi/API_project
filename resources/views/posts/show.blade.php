@extends('layouts.app')

@section('title', 'Просмотр поста')

@section('content')
    <h1>{{ $post->author }}</h1>
    <p>{{ $post->text }}</p>
    <p><strong>Просмотров:</strong> {{ $views }}</p>

    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Назад к списку</a>

    @if ($post->image)
        <div class="mt-3">
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded" style="max-width: 500px;">
        </div>
    @endif

    <hr>

    <h4 class="mt-4">Комментарии:</h4>

    @if ($post->comments->isEmpty())
        <p class="text-muted">Пока нет комментариев.</p>
    @else
        @foreach ($post->comments as $comment)
            <div class="card mb-2">
                <div class="card-body">
                    <p class="mb-1"><strong>{{ $comment->author }}</strong>:</p>
                    <p>{{ $comment->text }}</p>
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                </div>
            </div>
        @endforeach

    @endif

    <form action="{{ route('comments.store', ['post' => $post->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <input type="text" name="text" id="comment-text" placeholder="Ваш комментарий...">
        <button type="submit" class="btn btn-primary mt-2">Отправить</button>
    </form>

@endsection
