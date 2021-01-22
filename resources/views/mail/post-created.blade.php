@component('mail::message')
    # Создана новая статья: {{$post->name}}

    {{$post->shot_desc}}

    @component('mail::button', ['url' => route('posts.show', ['post' => $post->slug])])
        Смотреть на сайте
    @endcomponent

    С уважением,<br>
    команда сайта {{ config('app.name') }}
@endcomponent
