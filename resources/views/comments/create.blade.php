@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Добавить комментарий</h2>

        <form action="{{ route('comments.store') }}" method="POST">
            @csrf

            <input type="hidden" name="post_id" value="{{ request('post_id') ?? ($postId ?? '') }}">

            <div class="mb-3">
                <label for="author" class="form-label">Автор</label>
                <input type="text" class="form-control" id="author" name="author" required>
            </div>

            <div class="mb-3">
                <label for="text" class="form-label">Комментарий</label>
                <textarea class="form-control" id="text" name="text" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
