@extends('admin.news.layout')

@section('title', 'Добавить новость')

@section('content')
    <form method="post" action="{{route('admin.news.store')}}">
        @csrf
        @include('post.form', ['post'=>new \App\Models\News()])
    </form>
@endsection
