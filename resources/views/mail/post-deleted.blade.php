@component('mail::message')
    # Cтатья "{{$post->name}}" Была удалена

    {{$post->shortDesc}}

    С уважением,<br>
    команда сайта {{ config('app.name') }}
@endcomponent
