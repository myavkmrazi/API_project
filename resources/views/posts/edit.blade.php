@extends('layouts.app')

@section('title', 'Редактировать пост')

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
            padding: 0;
        }

        .edit-container {
            max-width: 600px;
            margin: 3rem auto 5rem;
            background-color: #4a5a4a;
            border-radius: 15px;
            box-shadow:
                5px 5px 15px #2a3a2a,
                -5px -5px 15px #5a7a5a;
            padding: 2rem 2.5rem;
            color: #d9d9c3;
            animation: fadeIn 0.6s ease-in-out forwards;
            user-select: none;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
            color: #f0e6e6;
            letter-spacing: 2px;
            text-shadow: 0 2px 6px rgba(62, 47, 47, 0.8);
            user-select: none;
        }

        form label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #cfcfc3;
            user-select: text;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
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
            resize: vertical;
            user-select: text;
        }

        input[type="text"]:focus,
        textarea:focus,
        input[type="file"]:focus {
            outline: none;
            background: #4a6a4a;
            box-shadow:
                inset 3px 3px 8px #3a7a3a,
                inset -3px -3px 8px #6a8a6a;
        }

        textarea {
            min-height: 120px;
        }

        .btn-warning {
            background: linear-gradient(135deg, #b07a4a, #9e6e4a);
            color: #f0e6e6;
            font-weight: 700;
            border: none;
            border-radius: 30px;
            padding: 0.7rem 2.2rem;
            cursor: pointer;
            box-shadow:
                0 4px 15px rgba(176, 122, 74, 0.6),
                inset 0 -2px 5px rgba(255, 255, 255, 0.2);
            transition:
                background 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                box-shadow 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            display: block;
            margin: 2rem auto 0;
            user-select: none;
            position: relative;
            overflow: hidden;
        }

        .btn-warning::before {
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

        .btn-warning:hover,
        .btn-warning:focus {
            background: linear-gradient(135deg, #d09e6a, #be8e6a);
            box-shadow:
                0 6px 20px rgba(208, 158, 106, 0.9),
                inset 0 -3px 7px rgba(255, 255, 255, 0.3);
            transform: translateY(-4px) scale(1.05);
            outline: none;
        }

        .btn-warning:hover::before,
        .btn-warning:focus::before {
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
            .edit-container {
                margin: 2rem 1rem 4rem;
                padding: 1.5rem 1.5rem;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>

    <div class="edit-container" role="main">
        <h1>Редактировать пост</h1>

        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')

            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required
                aria-required="true" placeholder="Введите заголовок">

            <label for="content" class="mt-4">Содержимое</label>
            <textarea name="content" id="content" rows="6" required aria-required="true" placeholder="Введите содержимое">{{ old('content', $post->content) }}</textarea>

            <label for="image" class="mt-4">Выберите изображение</label>
            <input type="file" id="image" name="image" accept="image/*" aria-describedby="imageHelp">

            <button type="submit" class="btn-warning" aria-label="Обновить пост">Обновить</button>
        </form>
    </div>
@endsection
