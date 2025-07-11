<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1e1e2f;
            /* Dark background */
            color: #ffffff;
            /* Light text color */
            font-family: 'Arial', sans-serif;
        }

        .navbar {
            background-color: #343a40;
            /* Navbar background */
        }

        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
            /* Navbar text color */
        }

        .content {
            margin: 20px;
            padding: 20px;
            background-color: #2a2a3c;
            /* Dark content background */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
            /* Shadow effect */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Blog</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.index') }}">Posts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield('content')
    </div>

    <!-- Bootstrap 5 JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
