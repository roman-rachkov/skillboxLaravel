@extends('layouts.front')

@section('title', 'Редктирование статьи')

@section('content')
    <form method="post" action="{{route('admin.news.update', ['news'=>$post])}}">
        @csrf
        @method('patch')
        <input type="hidden" value="{{$post->id}}" name="id">
        @include('post.form', ['post'=>$post])
    </form>
@endsection
