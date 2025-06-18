@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-5">Посты для комментирования</h2>


        <div class="row mt-4">
            @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post image"
                                style="max-height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ Str::limit($post->text, 100) }}</p>
                            <a href="{{ route('comments.create', ['post_id' => $post->id]) }}"
                                class="btn btn-dark mt-auto">Прокомментировать</a>
                            <a href="{{ route('posts.comments', $post->id) }}" class="btn btn-info btn-sm mt-2">Просмотр</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
