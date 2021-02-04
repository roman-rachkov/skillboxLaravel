@extends('layouts.front')

@section('title', 'Статистика сайта')

@section('content')

    @if(!is_null($stats['totalPosts']))
        <p>Общее количество статей: {{$stats['totalPosts']}}</p>
    @endif

    @if(!is_null($stats['totalNews']))
        <p>Общее количество новостей: {{$stats['totalNews']}}</p>
    @endif

    @if(!is_null($stats['userWithMostPosts']))
        <p>Самый пишущий автор: {{$stats['userWithMostPosts']->name}}</p>
    @endif

    @if(!is_null($stats['userWithMostPosts']))
        <p>Самый Комментирующий автор: {{$stats['userWithMostComments']->name}}</p>
    @endif


    @if(!is_null($stats['longestPost']))
        <p>Самая длинная статья: <a
                href="{{route('posts.show', ['post'=>$stats['longestPost']])}}">{{$stats['longestPost']->title}}</a>
        </p>
    @endif

    @if(!is_null($stats['shortestPost']))
        <p>Самая короткая статья: <a
                href="{{route('posts.show', ['post'=>$stats['shortestPost']])}}">{{$stats['shortestPost']->title}}</a>
        </p>
    @endif

    @if(!is_null($stats['avgPosts']))
        <p>Средние количество статей у пользователей: {{$stats['avgPosts']}}</p>
    @endif

    @if(!is_null($stats['mostChangeablePosts']))
        <p>Самая непостоянная статья: <a
                href="{{route('posts.show', ['post'=>$stats['mostChangeablePosts']])}}">{{$stats['mostChangeablePosts']->title}}</a>
        </p>
    @endif

    @if(!is_null($stats['mostCommentablePost']))
        <p>Самая обсуждаемая статья:<a
                href="{{route('posts.show', ['post'=>$stats['mostCommentablePost']])}}">{{$stats['mostCommentablePost']->title}}</a>
        </p>
    @endif
@endsection
