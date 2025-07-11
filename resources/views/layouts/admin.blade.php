<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Мой CRUD проект')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- В head -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            plugins: [window.daisyui],
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/daisyui"></script>


    <!-- DaisyUI -->
    <script>
        tailwind.config = {
            theme: {
                extend: {},
            },
            plugins: [],
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/daisyui@3.8.0"></script> {{-- версию можно уточнить --}}
</head>

<body class="bg-base-200 text-base-content">
    <!-- Навигационная панель от DaisyUI -->
    <div class="navbar bg-base-100 shadow-md">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl" href="{{ route('posts.index') }}">CRUD проект</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a href="{{ route('posts.index') }}">Посты</a></li>
                <li><a href="{{ route('comments.index') }}">Комментарии</a></li>
            </ul>
        </div>
    </div>

    <main class="p-4">
        @yield('content')
    </main>
</body>

</html>
