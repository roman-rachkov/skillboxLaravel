@extends('layouts.admin')

@section('title', 'Список постов')

@section('content')
    <main class="ftable">
        <div class="ftable__row header">
            <div class="ftable__column ftable__column_first">#</div>
            <div class="ftable__column ftable__column_second">Заголовок</div>
            <div class="ftable__column ftable__column_third">Краткое описание</div>
            <div class="ftable__column ftable__column_fourth">Дата публикации</div>
            <div class="ftable__column ftable__column_fifth">Управление</div>
        </div>
        <div class="ftable__column">
        @each('admin.post.single', $posts, 'post')
        </div>
    </main>
@endsection
