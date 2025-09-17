@extends('layouts.app')

@section('title', 'Создать пост')

@section('content')
    <style>
        /* Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        body {
            background-color: #3f0a0a;
            font-family: 'Montserrat', sans-serif;
            color: #d9d9c3;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .create-container {
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

        .btn-primary {
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
            display: block;
            margin: 2rem auto 0;
            user-select: none;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
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

        .btn-primary:hover,
        .btn-primary:focus {
            background: linear-gradient(135deg, #6abf8f, #4a5a4a);
            box-shadow:
                0 6px 20px rgba(106, 191, 143, 0.9),
                inset 0 -3px 7px rgba(255, 255, 255, 0.3);
            transform: translateY(-4px) scale(1.05);
            outline: none;
        }

        .btn-primary:hover::before,
        .btn-primary:focus::before {
            transform: rotate(25deg) translateX(100%);
        }

        .alert-success {
            background: #2a4a2a;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            color: #b6e7b6;
            font-weight: 600;
            box-shadow:
                0 0 10px #4caf5044;
            text-align: center;
            user-select: none;
        }

        .errors-list {
            background: #4a2a2a;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            color: #f7b6b6;
            font-weight: 600;
            box-shadow:
                0 0 10px #d9534f44;
            list-style-type: none;
            user-select: none;
        }

        .errors-list li {
            margin-bottom: 0.3rem;
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
            .create-container {
                margin: 2rem 1rem 4rem;
                padding: 1.5rem 1.5rem;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>

    <div class="create-container" role="main">
        <h1>Создать новый пост</h1>

        @if ($errors->any())
            <ul class="errors-list" role="alert" aria-live="assertive">
                @foreach ($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        @if (session('success'))
            <div class="alert-success" role="alert" aria-live="polite">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required aria-required="true"
                aria-describedby="titleHelp" placeholder="Введите заголовок">

            <label for="content" class="mt-4">Содержимое</label>
            <textarea name="content" id="content" rows="6" required aria-required="true" placeholder="Введите содержимое">{{ old('content') }}</textarea>

            <label for="image" class="mt-4">Выберите изображение</label>
            <input type="file" id="image" name="image" accept="image/*" aria-describedby="imageHelp">

            <button type="submit" class="btn-primary" aria-label="Сохранить новый пост">Сохранить</button>
        </form>
    </div>
@endsection
