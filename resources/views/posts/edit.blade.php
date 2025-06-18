@extends('layouts.app')

@section('title', 'Редактировать пост')

@section('content')
    <h1>Редактировать пост</h1>
    <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')



        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Содержимое</label>
            <textarea name="content" id="content" rows="5" class="form-control" required>{{ $post->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Выберите изображение</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn btn-warning">Обновить</button>
    </form>


@endsection
