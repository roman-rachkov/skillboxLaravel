@extends('layouts.front')

@section('title', 'Редактирование статьи')

@section('content')
    <form method="post" action="{{route('posts.update', ['post'=>$post])}}">
        @csrf
        @method('patch')
        <input type="hidden" value="{{$post->id}}" name="id">
        @include('post.form', ['post'=>$post])
    </form>
@endsection
