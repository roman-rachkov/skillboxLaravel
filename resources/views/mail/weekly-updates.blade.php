@component('mail::message')
    # Привет, {{$user->name}}

    ## Новое на сайте за неделю.

    #### Новые посты от пользователей:
    @foreach($posts as $post)
        ###### {{$post->title}}
        {{$post->short_desc}}
        @component('mail::button', ['url' => route('posts.show', ['post' => $post])])
            Читать на сайте
        @endcomponent
        ***
    @endforeach

    #### Новости на сайте:
    @foreach($news as $post)
        ###### {{$post->title}}
        {{$post->short_desc}}
        @component('mail::button', ['url' => route('posts.show', ['post' => $post])])
            Читать на сайте
        @endcomponent
        ***
    @endforeach


    С уважением,<br>
    Команда сайта {{ config('app.name') }}
@endcomponent
