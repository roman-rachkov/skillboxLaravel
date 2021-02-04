@admin
<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-2 text-muted" href="{{route('admin.posts.index')}}">Посты</a>
        <a class="p-2 text-muted" href="{{route('admin.news.index')}}">Новости</a>
        <a class="p-2 text-muted" href="{{route('admin.feedback')}}">Обращения</a>
    </nav>
</div>
<hr>

@yield('admin-sub-menu')

@endadmin
