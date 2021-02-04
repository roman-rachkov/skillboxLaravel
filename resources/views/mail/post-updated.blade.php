@component('mail::message')
    # Обновлена статья: {{$post->title}}

    {{$post->short_desc}}

    @component('mail::button', ['url' => route('posts.show', ['post' => $post])])
        Смотреть на сайте
    @endcomponent

    С уважением,<br>
    команда сайта {{ config('app.name') }}
@endcomponent
