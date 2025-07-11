@extends('layouts.parallax')

@section('title', 'Вход администратора')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="glass w-full max-w-md">
            <h2 class="text-2xl font-bold text-center mb-6">Вход в админ-панель</h2>

            <form method="POST" action="{{ route('admin.login_process') }}" class="space-y-4">
                @csrf

                <div>
                    <label>Email</label>
                    <input type="email" name="email"
                        class="w-full px-3 py-2 rounded bg-white bg-opacity-10 text-white border border-white/20" required>
                </div>

                <div>
                    <label>Пароль</label>
                    <input type="password" name="password"
                        class="w-full px-3 py-2 rounded bg-white bg-opacity-10 text-white border border-white/20" required>
                </div>

                <button type="submit" class="w-full py-2 mt-4 bg-blue-500 hover:bg-blue-600 rounded text-white">
                    Войти
                </button>
            </form>
        </div>
    </div>
@endsection
