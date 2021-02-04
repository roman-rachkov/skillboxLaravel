<div class="blog-post">

    <h2 class="blog-post-title"><a href="{{route('posts.show', ['post' => $post->getRouteKey()])}}">{{$post->title}}</a>
    </h2>
    @include('layouts.article')
    <a href="{{route('posts.show', ['post' => $post])}}">Читать даллее</a>
    <hr>
</div><!-- /.blog-post -->
