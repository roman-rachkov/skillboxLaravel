<div class="meta" style="display: flex; justify-content: flex-start; align-items: center">
    <img src="{{asset('img/'.$post->type.'.svg')}}" alt="{{$post->type}}" class="mb-3 me-1">
    <p class="blog-post-meta">@datetime($post->created_at) by
        <a href="{{route('user.show', ['user'=>$post->user->id])}}">{{$post->user->name}}</a></p>
</div>
@include('post.tags', ['tags'=>$post->tags])
<p>{{$post->short_desc}}</p>
<a href="{{route('posts.show', ['post' => $post])}}">Читать даллее</a>
