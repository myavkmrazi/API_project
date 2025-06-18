@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Комментарии к посту: {{ $post->title }}</h2>

        <div class="mb-4">
            <p><strong>Текст поста:</strong> {{ $post->text }}</p>
        </div>

        @forelse ($comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Автор: {{ $comment->author }}</h5>
                    <p class="card-text">{{ $comment->text }}</p>
                    <p class="card-text"><small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>
                </div>
            </div>
        @empty
            <p>Комментариев пока нет.</p>
        @endforelse

        <a href="{{ route('comments.index') }}" class="btn btn-secondary mt-4">Назад к комментариям</a>
    </div>
@endsection
