@extends('layouts.app')

@section('title', $info['title'])

@section('content')
    <style>
        /* Анимация плавного появления */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .about-container {
            max-width: 1000px;
            margin: 3rem auto 5rem;
            background: linear-gradient(145deg, #121212e5, #1a1a1acc);
            border-radius: 20px;
            box-shadow:
                8px 8px 20px #0a0a0a,
                -8px -8px 20px #2a2a2a;
            padding: 3rem 3.5rem;
            color: #d9d9c3;
            user-select: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            overflow: hidden;
        }

        /* Убрали блеск */

        .about-container h1 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
            font-weight: 900;
            letter-spacing: 1.5px;
            text-shadow: 0 0 8px #7a7a5a;
        }

        .about-container h2 {
            font-size: 2.2rem;
            margin-top: 3rem;
            margin-bottom: 2rem;
            font-weight: 800;
            color: #bfbf9f;
            text-shadow: 0 0 6px #5a7a5a;
            border-bottom: 2px solid #5a7a5a;
            padding-bottom: 0.3rem;
            max-width: fit-content;
        }

        .about-container p {
            font-size: 1.3rem;
            line-height: 1.9;
            margin-bottom: 5rem;
            font-weight: 100;
            color: #d9d9c3cc;
            text-shadow: 0 0 3px #000000aa;
            transition: color 0.3s ease;
        }

        .about-container p:hover {
            color: #e6e6c3;
        }

        .about-flex {
            display: flex;
            gap: 2.5rem;
            align-items: flex-start;
            background: none;
            padding: 0;
            margin-bottom: 5rem;
            flex-wrap: wrap;
        }

        .about-flex img {
            max-width: 320px;
            border-radius: 15px;
            flex-shrink: 0;
            box-shadow:
                0 8px 20px rgba(90, 122, 90, 0.7),
                inset 0 0 10px #7a9a7a;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            cursor: pointer;
        }

        .about-flex img:hover {
            transform: scale(1.05) rotate(2deg);
            box-shadow:
                0 12px 30px rgba(90, 122, 90, 0.9),
                inset 0 0 15px #a7c7a7;
        }

        .about-flex .about-text {
            flex: 1;
            font-size: 1.15rem;
            color: #d9d9c3dd;
            line-height: 1.8;
            font-weight: 600;
            user-select: text;
        }

        .bottom-image-text {
            margin-top: 3rem;
            text-align: center;
            color: #d9d9c3cc;
            font-weight: 600;
            font-size: 1.2rem;
            line-height: 1.7;
            text-shadow: 0 0 4px #000000bb;
            transition: color 0.3s ease;
        }

        .bottom-image-text:hover {
            color: #e6e6c3;
        }

        .bottom-image-text img {
            max-width: 100%;
            border-radius: 15px;
            margin: 1rem auto 2rem;
            box-shadow:
                0 10px 25px rgba(90, 122, 90, 0.6);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            cursor: pointer;
        }

        .bottom-image-text img:hover {
            transform: scale(1.03);
            box-shadow:
                0 15px 35px rgba(90, 122, 90, 0.9);
        }

        .site-info {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #5a7a5a;
            color: #cfcf9f;
            font-weight: 700;
            font-size: 1.3rem;
            text-shadow: 0 0 5px #4a5a4a;
        }

        .site-info h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            font-weight: 900;
            color: #bfbf9f;
            text-shadow: 0 0 6px #5a7a5a;
        }

        /* Плавное появление при скролле */
        .fade-in-section {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
            will-change: opacity, transform;
        }

        .fade-in-section.is-visible {
            opacity: 1;
            transform: none;
        }

        /* Адаптив */
        @media (max-width: 768px) {
            .about-flex {
                flex-direction: column;
                gap: 1.5rem;
            }

            .about-flex img {
                max-width: 100%;
                width: 100%;
            }
        }
    </style>

    <div class="container mt-5 about-container">
        <h1 class="fade-in-section">{{ $info['title'] }}</h1>
        <p class="fade-in-section">{{ $info['content'] }}</p>

        <h2 class="fade-in-section">About Me</h2>

        <div class="about-flex fade-in-section">
            <img src="{{ asset('images/yoru.jpg') }}" alt="Описание">
            <div class="about-text">
                <p>Hello, everyone! My name is Sabina, and I am 16 years old. This is one of my projects. I think this
                    project is one of the standard tasks for developers 😁 I have been studying programming for about 3-4
                    years (with breaks, but that's normal, haha). I'm learning backend PHP in Laravel, and I also plan to
                    develop full-fledged bots for Telegram.</p>
            </div>
        </div>

        <div class="bottom-image-text fade-in-section">
            <p>On this blog, I want to share my practical projects, useful notes, and insights on web development. Here, you
                can create posts, add images, and in the future, I plan to add comments, categories, and other interactive
                features.</p>
            <img src="{{ asset('images/mv1.png') }}" alt="Описание">
        </div>

        <div class="bottom-image-text fade-in-section">
            <p>In addition to programming, I am passionate about creativity. I work with Photoshop, create graphics and
                visual projects, and also play music: I play the guitar, write melodies, and simply enjoy the process of
                creating music. These skills help me better express ideas in projects and inspire new solutions in
                development.</p>
            <img src="{{ asset('images/spiderman.jpg') }}" alt="Описание">
        </div>

        <div class="bottom-image-text fade-in-section">
            <p>My goal is to constantly develop as a developer, learn new technologies, and create useful projects. This
                blog is a way for me to practise and show my skills to others. I hope that my project will be useful for
                both beginners and more experienced developers, as well as those who simply want to see how real web
                applications are created.</p>
            <img src="{{ asset('images/winter.jpg') }}" alt="Описание">
        </div>

        <div class="site-info fade-in-section">
            <h2>About the site</h2>
            <p>The main idea behind this site is a small blog platform with basic features for working with posts. Here you
                can create, edit, and delete posts — basically, everything you would find in standard CRUD projects, only in
                a more lively and convenient format.

                In addition, I want to turn the blog into more than just a place for notes, but a space where you can share
                news, interesting ideas, short stories and, of course, jokes. This mini-blog will be for anyone
                interested in following my projects and development.

                In the future, I plan to add more interactive features: categories and tags for easy searching, a system of
                likes and reactions, as well as the ability to subscribe to updates. This will make the site more convenient
                and lively, and the content more accessible and structured.

                I have a lot of ideas and projects that I want to implement, but, as always, it takes time. Therefore, the
                blog is also my way of moving forward step by step. I am open to collaboration and always welcome new ideas.
                If anyone wants to join, chat or suggest something interesting, I will be delighted.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const faders = document.querySelectorAll('.fade-in-section');

            const appearOptions = {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px"
            };

            const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) {
                        return;
                    } else {
                        entry.target.classList.add('is-visible');
                        appearOnScroll.unobserve(entry.target);
                    }
                });
            }, appearOptions);

            faders.forEach(fader => {
                appearOnScroll.observe(fader);
            });
        });
    </script>
@endsection
