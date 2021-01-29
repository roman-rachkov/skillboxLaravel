<p class="blog-post-meta">@datetime($post->created_at) by <a
        href="{{route('user.show', ['user'=>$post->user->id])}}">{{$post->user->name}}</a></p>
@include('post.tags', ['tags'=>$post->tags])
<p>{{$post->short_desc}}</p>
<a href="{{route('posts.show', ['post' => $post])}}">Читать даллее</a>
