@extends('layouts.front')

@section('title', 'Новая статья')

@section('content')
    <form method="post" action="{{route('posts.store')}}">
        @csrf
        @include('post.form', ['post'=>new \App\Models\Post()])
    </form>
@endsection
