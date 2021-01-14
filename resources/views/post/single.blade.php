<div class="blog-post">
    <h2 class="blog-post-title"><a href="{{route('posts.show', ['post' => $post->getRouteKey()])}}">{{$post->name}}</a></h2>
    <p class="blog-post-meta">{{$post->user->name}}, {{$post->created_at->toFormattedDateString()}}</p>
    @include('post.tags', ['tags'=>$post->tags])
    <p>{{$post->shortDesc}}</p>
    <a href="{{route('posts.show', ['post' => $post->slug])}}">Читать даллее</a>
    <hr>

</div><!-- /.blog-post -->
