@auth
    <form action="{{route('news.comments.store', ['news'=> $news])}}" method="post">
    @include('comments.comment-form')
    </form>
@endauth
