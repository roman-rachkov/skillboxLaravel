<div class="comment">
    <div class="meta" style="display: flex; justify-content: flex-start; align-items: center">
        <p class="blog-post-meta">@datetime($comment->created_at) by
            <a href="{{route('user.show', ['user'=>$comment->user->id])}}">{{$comment->user->name}}</a></p>
    </div>

    <p>
        {{$comment->comment}}
    </p>

    <hr>

</div>
