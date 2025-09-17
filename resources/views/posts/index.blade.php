@extends('layouts.app')

@section('title', 'Список постов')

@section('content')
    <style>
        /* Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        body {
            background-color: #2b1515;
            font-family: 'Montserrat', sans-serif;
            color: #d9d9c3;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
            color: #f0e6e6;
            letter-spacing: 2px;
            text-shadow: 0 2px 6px rgba(62, 47, 47, 0.8);
            user-select: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto 3rem;
            padding: 0 1rem;
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in-out forwards;
            opacity: 0;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .d-flex.justify-content-between.align-items-center.mb-5 {
            flex-wrap: wrap;
            gap: 1rem;
        }

        /* Улучшенный стиль кнопки "Создать пост" с плавным эффектом */
        .btn-create-post {
            font-weight: 700;
            border-radius: 30px;
            padding: 0.7rem 2.2rem;
            font-size: 1.1rem;
            color: #f0e6e6;
            background: linear-gradient(135deg, #4a7a6a, #6abf8f);
            box-shadow:
                0 4px 15px rgba(106, 191, 143, 0.6),
                inset 0 -2px 5px rgba(255, 255, 255, 0.2);
            border: none;
            cursor: pointer;
            user-select: none;
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
            transition:
                background 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                box-shadow 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .btn-create-post::before {
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

        .btn-create-post:hover,
        .btn-create-post:focus {
            background: linear-gradient(135deg, #6abf8f, #4a7a6a);
            box-shadow:
                0 6px 20px rgba(106, 191, 143, 0.9),
                inset 0 -3px 7px rgba(255, 255, 255, 0.3);
            transform: translateY(-4px) scale(1.05);
            outline: none;
        }

        .btn-create-post:hover::before,
        .btn-create-post:focus::before {
            transform: rotate(25deg) translateX(100%);
        }

        /* Остальные стили кнопок и элементов оставлены без изменений */
        .btn {
            font-weight: 600;
            border-radius: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
            transition: all 0.3s ease;
            cursor: pointer;
            user-select: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1rem;
            text-decoration: none;
            border: none;
            padding: 0.6rem 1.8rem;
            text-align: center;
            white-space: nowrap;
        }

        .btn-light {
            background-color: #4a5a4a;
            color: #f0e6e6;
            border: 2px solid transparent;
            box-shadow: 0 0 10px #5a6a5a88;
        }

        .btn-light:hover,
        .btn-light:focus {
            background-color: #6a7a6a;
            box-shadow: 0 0 20px #8a9a8a88;
            transform: scale(1.1);
            outline: none;
        }

        .btn-outline-info,
        .btn-outline-warning,
        .btn-outline-danger {
            border: 2px solid #f0e6e6;
            background: transparent;
            color: #f0e6e6;
            font-weight: 600;
            border-radius: 25px;
            padding: 0.4rem 1rem;
            box-shadow: 0 0 8px rgba(240, 230, 230, 0.15);
            transition: all 0.3s ease;
            font-size: 0.9rem;
            flex: 1 1 120px;
            max-width: 150px;
            min-width: 120px;
            justify-content: center;
        }

        .btn-outline-info:hover,
        .btn-outline-info:focus {
            color: #4db8ff;
            box-shadow:
                0 0 8px #4db8ff,
                0 0 20px #4db8ffaa;
            background: rgba(77, 184, 255, 0.1);
            transform: scale(1.1);
            outline: none;
        }

        .btn-outline-warning:hover,
        .btn-outline-warning:focus {
            color: #ffc107;
            box-shadow:
                0 0 8px #ffc107,
                0 0 20px #ffc107aa;
            background: rgba(255, 193, 7, 0.1);
            transform: scale(1.1);
            outline: none;
        }

        .btn-outline-danger:hover,
        .btn-outline-danger:focus {
            color: #dc3545;
            box-shadow:
                0 0 8px #dc3545,
                0 0 20px #dc3545aa;
            background: rgba(220, 53, 69, 0.1);
            transform: scale(1.1);
            outline: none;
        }

        .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background-color: #4a5a4a;
            border-radius: 15px;
            box-shadow:
                5px 5px 15px #2a3a2a,
                -5px -5px 15px #5a7a5a;
            color: #d9d9c3;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: default;
            user-select: none;
        }

        .card:hover,
        .card:focus-within {
            transform: translateY(-8px);
            box-shadow:
                8px 8px 25px #1a2a1a,
                -8px -8px 25px #6a8a6a;
            outline: none;
        }

        .card-img-top {
            width: 100%;
            height: 140px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            filter: brightness(0.85);
            transition: filter 0.3s ease;
        }

        .card:hover .card-img-top,
        .card:focus-within .card-img-top {
            filter: brightness(1);
        }

        .card-body {
            flex-grow: 1;
            padding: 1.25rem 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: #f0e6e6;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.7);
            min-height: 3rem;
            user-select: text;
        }

        .card-footer {
            background: transparent;
            border-top: 1px solid #3a5a3a;
            padding: 0.75rem 1.5rem;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.75rem;
        }

        form {
            margin: 0;
            flex: 1 1 120px;
            max-width: 150px;
            min-width: 120px;
        }

        @media (max-width: 480px) {
            .card-footer {
                flex-direction: column;
                gap: 0.5rem;
                align-items: center;
            }

            .btn-outline-info,
            .btn-outline-warning,
            .btn-outline-danger,
            form {
                flex: 1 1 100%;
                max-width: 100%;
                min-width: unset;
            }
        }
    </style>

    <div class="container mt-5 fade-in" role="main">
        <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">
            <h1>Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn-create-post" aria-label="Создать пост">+ Создать пост</a>
        </div>

        <div class="row" role="list">
            @foreach ($posts as $post)
                <article class="card" role="listitem" tabindex="0" aria-label="Пост: {{ $post->title }}">
                    @if ($post->image)
                        <img src="{{ asset('storage/' . $post->image) }}" alt="Изображение для {{ $post->title }}"
                            class="card-img-top" loading="lazy" />
                    @else
                        <img src="https://via.placeholder.com/400x200/5a7a5a/d9d9c3?text=Нет+изображения"
                            alt="Нет изображения" class="card-img-top" loading="lazy" />
                    @endif

                    <div class="card-body">
                        <h2 class="card-title" title="{{ $post->title }}">
                            {{ \Illuminate\Support\Str::limit($post->title, 50) }}
                        </h2>

                        <!-- Добавляем содержимое поста -->
                        <p>{{ \Illuminate\Support\Str::limit($post->content, 100) }}</p>
                    </div>


                    <div class="card-footer">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-info btn-sm"
                            aria-label="Просмотр поста {{ $post->title }}">👁 Просмотр</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm"
                            aria-label="Редактировать пост {{ $post->title }}">✏ Редактировать</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                            onsubmit="return confirm('Удалить этот пост?');" aria-label="Удалить пост {{ $post->title }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">🗑 Удалить</button>
                        </form>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
@endsection
