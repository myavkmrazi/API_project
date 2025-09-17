@extends('layouts.app')

@section('title', 'Просмотр поста')

@section('content')
    <style>
        /* Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        body {
            background-color: #3e2f2f;
            font-family: 'Montserrat', sans-serif;
            color: #d9d9c3;
            min-height: 100vh;
            margin: 0;
            padding: 0 1rem 3rem;
        }

        .post-container {
            max-width: 800px;
            margin: 3rem auto;
            background-color: #4a5a4a;
            border-radius: 15px;
            box-shadow:
                5px 5px 15px #2a3a2a,
                -5px -5px 15px #5a7a5a;
            padding: 2rem 2.5rem;
            user-select: none;
            animation: fadeIn 0.6s ease-in-out forwards;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #f0e6e6;
            letter-spacing: 2px;
            text-shadow: 0 2px 6px rgba(62, 47, 47, 0.8);
            user-select: text;
        }

        .post-text {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            color: #d9d9c3;
            user-select: text;
        }

        .post-views {
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #b0b0a0;
            user-select: text;
        }

        .btn-back {
            background-color: #4a5a4a;
            color: #f0e6e6;
            border: none;
            border-radius: 30px;
            padding: 0.6rem 1.8rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
            cursor: pointer;
            transition: background 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
            user-select: none;
            display: inline-block;
            text-decoration: none;
            margin-bottom: 2rem;
        }

        .btn-back:hover,
        .btn-back:focus {
            background-color: #6a7a6a;
            box-shadow: 0 0 20px #8a9a8a88;
            transform: scale(1.05);
            outline: none;
        }

        .post-image {
            max-width: 100%;
            max-height: 400px;
            border-radius: 15px;
            object-fit: cover;
            box-shadow:
                5px 5px 15px #2a3a2a,
                -5px -5px 15px #5a7a5a;
            margin-bottom: 2rem;
            user-select: none;
        }

        hr {
            border-color: #3a5a3a;
            margin: 2rem 0;
        }

        h4 {
            color: #f0e6e6;
            margin-bottom: 1rem;
            user-select: none;
        }

        .comment-card {
            background-color: #3a5a3a;
            border-radius: 12px;
            box-shadow:
                3px 3px 10px #2a3a2a,
                -3px -3px 10px #5a7a5a;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            color: #d9d9c3;
            user-select: text;
        }

        .comment-author {
            font-weight: 700;
            margin-bottom: 0.3rem;
            user-select: text;
        }

        .comment-text {
            margin-bottom: 0.5rem;
            user-select: text;
        }

        .comment-time {
            font-size: 0.85rem;
            color: #a0a080;
            user-select: text;
        }

        form.comment-form {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        form.comment-form input[type="text"] {
            padding: 0.6rem 1rem;
            border-radius: 15px;
            border: none;
            background: #3a5a3a;
            color: #d9d9c3;
            font-size: 1rem;
            box-shadow:
                inset 3px 3px 6px #2a3a2a,
                inset -3px -3px 6px #5a7a5a;
            transition: background 0.3s ease, box-shadow 0.3s ease;
            user-select: text;
        }

        form.comment-form input[type="text"]:focus {
            outline: none;
            background: #4a6a4a;
            box-shadow:
                inset 3px 3px 8px #3a7a3a,
                inset -3px -3px 8px #6a8a6a;
        }

        form.comment-form button {
            background: linear-gradient(135deg, #4a5a4a, #6abf8f);
            color: #f0e6e6;
            font-weight: 700;
            border: none;
            border-radius: 30px;
            padding: 0.7rem 2.2rem;
            cursor: pointer;
            box-shadow:
                0 4px 15px rgba(106, 191, 143, 0.6),
                inset 0 -2px 5px rgba(255, 255, 255, 0.2);
            transition:
                background 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                box-shadow 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            user-select: none;
            position: relative;
            overflow: hidden;
            align-self: flex-start;
        }

        form.comment-form button::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -25%;
            width: 150%;
            height: 200%;
            background: rgba(255, 255, 255, 0.15);
            transform: rotate(25deg);
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: none;
        }

        form.comment-form button:hover,
        form.comment-form button:focus {
            background: linear-gradient(135deg, #6abf8f, #4a5a4a);
            box-shadow:
                0 6px 20px rgba(106, 191, 143, 0.9),
                inset 0 -3px 7px rgba(255, 255, 255, 0.3);
            transform: translateY(-4px) scale(1.05);
            outline: none;
        }

        form.comment-form button:hover::before,
        form.comment-form button:focus::before {
            transform: rotate(25deg) translateX(100%);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 576px) {
            .post-container {
                margin: 2rem 1rem 4rem;
                padding: 1.5rem 1.5rem;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>

    <div class="post-container" role="main">
        <h1>{{ $post->author }}</h1>
        <p class="post-text">{{ $post->text }}</p>
        <p class="post-views"><strong>Просмотров:</strong> {{ $views }}</p>

        <a href="{{ route('posts.index') }}" class="btn-back" aria-label="Назад к списку постов">← Назад к списку</a>

        @if ($post->image)
            <div>
                <img src="{{ asset('storage/' . $post->image) }}" alt="Изображение поста" class="post-image" loading="lazy">
            </div>
        @endif

        <hr>

        <h4>Комментарии:</h4>

        @if ($post->comments->isEmpty())
            <p class="text-muted" style="user-select: none;">Пока нет комментариев.</p>
        @else
            @foreach ($post->comments as $comment)
                <div class="comment-card" role="article" aria-label="Комментарий от {{ $comment->author }}">
                    <p class="comment-author">{{ $comment->author }}:</p>
                    <p class="comment-text">{{ $comment->text }}</p>
                    <small class="comment-time">{{ $comment->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        @endif

        <form action="{{ route('comments.store', ['post' => $post->id]) }}" method="POST" class="comment-form" novalidate>
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <input type="text" name="text" id="comment-text" placeholder="Ваш комментарий..."
                aria-label="Текст комментария" required>
            <button type="submit" aria-label="Отправить комментарий">Отправить</button>
        </form>
    </div>
@endsection
