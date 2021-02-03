@extends('admin.news.layout')

@section('title', 'Добавить новость')

@section('content')
    <form method="post" action="{{route('admin.news.store')}}">
        @csrf
        @include('admin.news.form', ['news'=>new \App\Models\News()])
    </form>
@endsection
