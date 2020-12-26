<div class="blog-post">
    <h2 class="blog-post-title"><a href="{{route('View Post', ['slug' => $post->slug])}}">{{$post->name}}</a></h2>
    <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}}</p>

    <p>{{$post->shortDesc}}</p>
    <a href="{{route('View Post', ['slug' => $post->slug])}}">Читать даллее</a>
    <hr>

</div><!-- /.blog-post -->
