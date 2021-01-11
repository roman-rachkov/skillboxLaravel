@extends('layouts.front')

@section('title', $post->name)

@section('content')

    <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}}</p>

    <p>{{$post->shortDesc}}</p>
    <p>{{$post->longDesc}}</p>
    <hr>
    <a href="#" onclick="history.back()">Вернуться назад</a>

@endsection
