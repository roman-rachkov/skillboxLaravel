@extends('layouts.admin')

@section('admin-sub-menu')
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="{{route('admin.posts.index')}}">Все статьи</a>
            <a class="p-2 text-muted" href="{{route('admin.posts.create')}}">Добавить статью</a>
        </nav>
    </div>
    <hr>
@endsection
