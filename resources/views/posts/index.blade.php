@extends('layouts.app')

@section('title', 'Список постов')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Посты</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Создать пост</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">Просмотр</a>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Удалить пост?')">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
