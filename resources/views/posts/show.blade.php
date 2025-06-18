@extends('layouts.app')

@section('title', 'Просмотр поста')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Назад к списку</a>
    @if ($post->image)
        <div class="mt-3">
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded" style="max-width: 500px;">
        </div>
    @endif
@endsection
