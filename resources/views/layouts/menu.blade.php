<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="{{route('main')}}">Главная</a>
        <a class="p-2 text-muted" href="{{route('news')}}">Новости</a>
        <a class="p-2 text-muted" href="{{route('about')}}">О нас</a>
        <a class="p-2 text-muted" href="{{route('contacts')}}">Контакты</a>
        @auth
            <a class="p-2 text-muted" href="{{route('posts.create')}}">Новая статья</a>
        @endauth
        @admin
            <a class="p-2 text-muted" href="{{route('admin.main')}}">Административный раздел</a>
        @endadmin
    </nav>
</div>
<hr>
