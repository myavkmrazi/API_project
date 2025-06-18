@extends('layouts.app')

@section('title', 'Создать пост')

@section('content')
    <h1>Создать новый пост</h1>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Содержимое</label>
            <textarea name="content" id="content" rows="5" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Выберите изображение</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>


@endsection
