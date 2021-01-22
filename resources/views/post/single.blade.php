<div class="blog-post">
    <h2 class="blog-post-title"><a href="{{route('posts.show', ['post' => $post->getRouteKey()])}}">{{$post->name}}</a>
    </h2>
    <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} by <a
            href="{{route('user.show', ['user'=>$post->user->id])}}">{{$post->user->name}}</a></p>
    @include('post.tags', ['tags'=>$post->tags])
    <p>{{$post->shot_desc}}</p>
    <a href="{{route('posts.show', ['post' => $post->slug])}}">Читать даллее</a>
    <hr>

</div><!-- /.blog-post -->
