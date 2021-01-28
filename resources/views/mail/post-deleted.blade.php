@component('mail::message')
    # Cтатья "{{$post->title}}" Была удалена

    {{$post->short_desc}}

    С уважением,<br>
    команда сайта {{ config('app.name') }}
@endcomponent
