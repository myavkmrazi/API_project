@extends('layouts.app')

@section('title', 'List of Posts')

@section('content')
    <style>
        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .btn {
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid transparent;
            /* Initial border */
        }

        .btn-light {
            background-color: #4e4e4e;
            /* Dark button background */
            color: #ffffff;
            /* Light text color */
            border: 2px solid #ffffff;
            /* White border */
        }

        .btn-light:hover {
            background-color: #6e6e6e;
            /* Lighter on hover */
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            /* Glow effect */
        }

        .btn-outline-info,
        .btn-outline-warning,
        .btn-outline-danger {
            border: 2px solid #ffffff;
            /* White border */
            color: #ffffff;
            /* Light text color */
            transition: color 0.3s, box-shadow 0.3s;
        }

        .btn-outline-info:hover,
        .btn-outline-warning:hover,
        .btn-outline-danger:hover {
            color: #1e1e2f;
            /* Change text color on hover */
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5), 0 0 20px rgba(255, 255, 255, 0.3);
            /* Glow effect */
            transform: scale(1.05);
            /* Slightly enlarge on hover */
        }

        .card {
            background-color: #2a2a3c;
            /* Darker card background */
            color: #ffffff;
            /* Light text color */
            border: none;
            /* No border */
            border-radius: 8px;
            /* Rounded corners */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            /* Shadow effect */
            transition: transform 0.3s, box-shadow 0.3s;
            /* Smooth transition */
        }

        .card:hover {
            transform: translateY(-5px);
            /* Lift effect on hover */
            box-shadow: 0 0 25px rgba(255, 255, 255, 0.2);
            /* Enhanced shadow on hover */
        }

        .card-img-top {
            object-fit: cover;
            /* Cover the area */
            height: 200px;
            /* Fixed height for images */
            border-top-left-radius: 8px;
            /* Rounded top corners */
            border-top-right-radius: 8px;
            /* Rounded top corners */
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
            /* Fade-in effect */
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                /* Start transparent */
            }

            to {
                opacity: 1;
                /* End fully visible */
            }
        }
    </style>

    <div class="container mt-4 fade-in">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Posts</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-light">➕ Create Post</a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($posts as $post)
                <div class="col">
                    <div class="card h-100">
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="card-img-top">
                        @else
                            <img src="https://via.placeholder.com/400x200/444/fff?text=No+Image" class="card-img-top"
                                alt="No image">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text text-muted">Post ID: {{ $post->id }}</p>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-outline-info btn-sm">👁 View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm">✏ Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm"
                                    onclick="return confirm('Delete this post?')">🗑 Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
