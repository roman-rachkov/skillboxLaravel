<div class="blog-post">
    <h2 class="blog-post-title"><a href="{{route('posts.show', ['post' => $post->getRouteKey()])}}">{{$post->title}}</a>
    </h2>
    <p class="blog-post-meta">@datetime($post->created_at) by <a
            href="{{route('user.show', ['user'=>$post->user->id])}}">{{$post->user->name}}</a></p>
    @include('post.tags', ['tags'=>$post->tags])
    <p>{{$post->short_desc}}</p>
    <a href="{{route('posts.show', ['post' => $post])}}">Читать даллее</a>
    <hr>

</div><!-- /.blog-post -->
