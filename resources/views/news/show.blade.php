@extends('layouts.front')

@section('title', $news->title)

@section('content')

    <div class="meta" style="display: flex; justify-content: flex-start; align-items: center">
        <img src="{{asset('img/'.$news->type.'.svg')}}" alt="{{$news->type}}" class="mb-3 me-1">
        <p class="blog-post-meta">@datetime($news->created_at) by
            <a href="{{route('user.show', ['user'=>$news->user->id])}}">{{$news->user->name}}</a></p>
    </div>
    @include('post.tags', ['tags' => $news->tags])
    <p>{{$news->short_desc}}</p>
    <p>{{$news->long_desc}}</p>
    <hr>
    @auth
        @admin
        <a href="{{route('admin.news.edit', ['news' => $news])}}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path
                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd"
                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
            Редактировать
        </a>
        <br>

        @endadmin
    @endauth
    <a href="#" onclick="history.back()">Вернуться назад</a>
    <hr>
    @each('comments.single',$news->comments, 'comment', 'comments.empty')
    @include('comments.comment-news')

@endsection
