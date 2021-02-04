@auth
    <form action="{{route('posts.comments.store', ['post' => $post])}}" method="post">
        @include('comments.comment-form')
    </form>
@endauth
