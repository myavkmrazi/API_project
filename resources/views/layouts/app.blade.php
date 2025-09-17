<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'My Blog')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-..." crossorigin="anonymous" />

    <style>
        body {
            background-color: #2b1515;
            /* тёмный бордовый */
            color: #d9d9c3;
            /* светло-бежевый */
            font-family: 'Montserrat', Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        /* Хедер (navbar) */
        .navbar {
            background-color: #0b0e0b;
            /* болотный */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
            padding-top: 1.2rem;
            padding-bottom: 1.2rem;
        }

        /* Логотип */
        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 700;
            color: #f0e6e6 !important;
            font-size: 1.8rem;
            user-select: none;
            margin-left: 22rem;
        }

        .navbar-nav .nav-item {
            margin-left: 2rem;
            /* расстояние между кнопками */
        }

        .navbar-nav {
            margin-left: auto;
            /* отталкивает блок вправо */
            margin-right: 21rem;
            /* сдвигаем весь блок на 2rem влево */
        }

        .navbar-brand img {
            height: 48px;
            width: auto;
            margin-right: 0.75rem;
            user-select: none;
        }

        /* Заголовок рядом с логотипом */
        .navbar-brand .brand-text {
            font-size: 1.6rem;
            letter-spacing: 2px;
            user-select: none;
        }

        /* Ссылки навигации */
        .nav-link {
            color: #f0e6e6 !important;
            font-weight: 700;
            transition: color 0.3s ease;
            user-select: none;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: #a8c0a0 !important;
            /* светло-зелёный оттенок */
            text-decoration: underline;
            outline: none;
        }

        /* Кнопка для мобильного меню */
        .navbar-toggler {
            border-color: #a8c0a0;
        }

        .navbar-toggler-icon {
            filter: invert(1);
        }

        /* Основной контент */
        main.content {
            margin: 2rem auto;
            padding: 2rem;
            background-color: #2a3a2a;
            /* тёмный болотный */
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.7);
            max-width: 1200px;
            min-height: calc(100vh - 110px);
            transition: background-color 0.3s ease;
            outline: none;
        }

        /* Ссылки внутри контента */
        main.content a {
            color: #a8c0a0;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        main.content a:hover,
        main.content a:focus {
            color: #d9d9c3;
            text-decoration: underline;
            outline: none;
        }

        /* Мобильная адаптивность */
        @media (max-width: 576px) {
            main.content {
                padding: 1rem;
                margin: 1rem;
                min-height: auto;
            }

            .navbar-brand {
                font-size: 1.4rem;
            }

            .navbar-brand .brand-text {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" aria-label="Главная навигация">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
                <!-- Ваш логотип: замените путь на свой -->
                <img src="{{ asset('images/mv1.png') }}" alt="Логотип" loading="lazy" />
                <span class="brand-text">Blog Posts</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Переключить навигацию">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.create') }}">Create post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">About the site</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contacts') }}">Contacts</a>
                    </li>
                    <!-- Добавьте другие ссылки меню здесь -->
                </ul>
            </div>
        </div>
    </nav>

    <main class="content" role="main" tabindex="-1">
        @yield('content')
    </main>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-..."
        crossorigin="anonymous"></script>

    @stack('scripts')
</body>

</html>
