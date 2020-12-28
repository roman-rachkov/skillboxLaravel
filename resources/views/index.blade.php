@extends('layouts.front')

@section('title', 'Главная')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            @yield('title')
        </h3>

        @foreach($posts as $post)
            @include('post.single')
        @endforeach

        {{$posts->links('layouts.pagination')}}

    </div><!-- /.blog-main -->
@endsection
