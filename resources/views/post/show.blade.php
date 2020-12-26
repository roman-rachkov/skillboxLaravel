@extends('layouts.front')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{$post->name}}
        </h3>
        <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}}</p>

        <p>{{$post->shortDesc}}</p>
        <p>{{$post->longDesc}}</p>
        <hr>
        <a href="#" onclick="history.back()">Вернуться назад</a>

    </div><!-- /.blog-post -->

@endsection
