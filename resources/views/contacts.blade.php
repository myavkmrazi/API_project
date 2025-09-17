@extends('layouts.app')

@section('title', 'Связаться со мной')

@section('content')
    <style>
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

        .contact-container {
            max-width: 700px;
            margin: 4rem auto 6rem;
            background: linear-gradient(145deg, #121212e5, #1a1a1acc);
            border-radius: 20px;
            box-shadow:
                8px 8px 20px #0a0a0a,
                -8px -8px 20px #2a2a2a;
            padding: 3rem 3.5rem;
            color: #d9d9c3;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            user-select: none;
            position: relative;
            overflow: hidden;
        }

        .contact-container h2 {
            font-size: 2.8rem;
            font-weight: 900;
            margin-bottom: 2rem;
            letter-spacing: 1.5px;
            text-shadow: 0 0 8px #7a7a5a;
            animation: fadeInUp 0.8s ease forwards;
            text-align: center;
        }

        .contact-list {
            max-width: 650px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 1.8rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            background: rgba(90, 122, 90, 0.15);
            border-radius: 15px;
            padding: 1rem 1.5rem;
            box-shadow:
                inset 0 0 10px #7a9a7a,
                0 4px 10px rgba(90, 122, 90, 0.3);
            transition: background-color 0.3s ease;
            animation: fadeInUp 0.8s ease forwards;
        }

        .contact-item:hover {
            background: rgba(90, 122, 90, 0.3);
        }

        .btn-contact {
            flex-shrink: 0;
            min-width: 140px;
            padding: 0.75rem 1.8rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            box-shadow:
                0 6px 15px rgba(90, 122, 90, 0.7),
                inset 0 0 8px #7a9a7a;
            color: #d9d9c3;
            text-decoration: none;
            text-align: center;
            user-select: none;
            display: inline-block;

            transition:
                background-color 0.4s ease,
                box-shadow 0.4s ease,
                color 0.4s ease,
                transform 0.4s ease;
        }

        .btn-contact:hover {
            transform: scale(1.05) translateY(-3px);
            box-shadow:
                0 10px 25px rgba(90, 122, 90, 0.9),
                inset 0 0 12px #a7c7a7;
            color: #f0f0d8;
        }

        /* Цвета кнопок */
        .btn-telegram {
            background-color: #0088cc;
            border: none;
            text-shadow: 0 0 4px #005577;
        }

        .btn-telegram:hover {
            background-color: #00aaff;
            text-shadow: 0 0 8px #0077aa;
        }

        .btn-instagram {
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%, #d6249f 60%, #285AEB 90%);
            border: none;
            text-shadow: 0 0 6px #a02a7f;
        }

        .btn-instagram:hover {
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 10%, #fd5949 55%, #d6249f 70%, #285AEB 100%);
            text-shadow: 0 0 10px #d6249f;
        }

        .btn-youtube {
            background-color: #ff0000;
            border: none;
            text-shadow: 0 0 6px #aa0000;
        }

        .btn-youtube:hover {
            background-color: #e60000;
            text-shadow: 0 0 10px #ff3333;
        }

        .btn-github {
            background-color: #24292e;
            border: none;
            text-shadow: 0 0 4px #000000cc;
        }

        .btn-github:hover {
            background-color: #444c56;
            text-shadow: 0 0 8px #222222cc;
        }

        .btn-kwork {
            background-color: #ff6f00;
            border: none;
            text-shadow: 0 0 4px #b35c00;
        }

        .btn-kwork:hover {
            background-color: #ff8f1a;
            text-shadow: 0 0 8px #cc7a00;
        }

        .contact-desc {
            flex: 1;
            font-size: 1.1rem;
            font-weight: 500;
            color: #d9d9c3cc;
            line-height: 1.4;
            user-select: text;
            text-shadow: 0 0 3px #000000aa;
        }

        /* Новый стиль для выделенного контейнера Telegram Connect */
        .contact-item.telegram-connect-container {
            max-width: 400px;
            margin-top: 3rem;
            /* Отступ сверху, чтобы отдалить от других */
            background: rgba(0, 191, 255, 0.15);
            box-shadow:
                inset 0 0 15px #00bfff,
                0 6px 20px rgba(0, 191, 255, 0.5);
            border-radius: 20px;
            padding: 1rem 1.5rem;
            transition: background-color 0.3s ease;
        }

        .contact-item.telegram-connect-container:hover {
            background: rgba(0, 191, 255, 0.3);
        }

        /* Адаптив */
        @media (max-width: 768px) {
            .contact-item {
                flex-direction: column;
                align-items: stretch;
                gap: 0.8rem;
            }

            .btn-contact {
                min-width: 100%;
                padding: 0.75rem 0;
            }

            .contact-desc {
                font-size: 1rem;
            }

            .contact-item.telegram-connect-container {
                max-width: 100%;
                margin-top: 2rem;
            }
        }
    </style>

    <div class="container contact-container">
        <h2>Свяжитесь со мной</h2>

        <div class="contact-list">
            <div class="contact-item" style="animation-delay: 0s;">
                <a href="https://www.youtube.com/channel/UCmNmNuFtZpqBd2VPpxF3BcQ" target="_blank" rel="noopener noreferrer"
                    aria-label="YouTube" class="btn-contact btn-youtube">YouTube</a>
                <p class="contact-desc">My channel features videos about games — fun skating sessions with friends,
                    interesting moments, and sometimes something unusual and funny.</p>
            </div>

            <div class="contact-item" style="animation-delay: 0.1s;">
                <a href="https://www.instagram.com/myavk88?igsh=MXN5NnNlcnluajJ5cg==" target="_blank"
                    rel="noopener noreferrer" aria-label="Instagram" class="btn-contact btn-instagram">Instagram</a>
                <p class="contact-desc">Cool photos and full vibe</p>
            </div>

            <div class="contact-item" style="animation-delay: 0.2s;">
                <a href="https://t.me/+Ln5wsCSUkqk4OGJi" target="_blank" rel="noopener noreferrer" aria-label="Telegram"
                    class="btn-contact btn-telegram">Telegram</a>
                <p class="contact-desc">Also just aesthetics, a distinct vibe, and some references to my thoughts</p>
            </div>


            <div class="contact-item" style="animation-delay: 0.3s;">
                <a href="https://github.com/myavkmrazi" target="_blank" rel="noopener noreferrer" aria-label="GitHub"
                    class="btn-contact btn-github">GitHub</a>
                <p class="contact-desc">This is my workspace, where you can see how I am developing as a developer💅🏻</p>
            </div>

            <div class="contact-item" style="animation-delay: 0.4s;">
                <a href="https://kwork.ru/user/yoru88" target="_blank" rel="noopener noreferrer" aria-label="Kwork"
                    class="btn-contact btn-kwork">Kwork</a>
                <p class="contact-desc">If you want to implement something or work together, this is a great place to get in
                    touch.</p>
            </div>
            <div class="contact-item telegram-connect-container" style="animation-delay: 0.25s;">
                <a href="https://t.me/myavk88" target="_blank" rel="noopener noreferrer" aria-label="Telegram Connect"
                    class="btn-contact btn-telegram">Telegram Connect</a>
                <p class="contact-desc">To contact me: Telegram - myavk88</p>
            </div>
        </div>
    </div>
@endsection
