@component('mail::message')
    # Создана новая статья: {{$post->name}}

    {{$post->short_desc}}

    @component('mail::button', ['url' => route('posts.show', ['post' => $post])])
        Смотреть на сайте
    @endcomponent

    С уважением,<br>
    команда сайта {{ config('app.name') }}
@endcomponent
