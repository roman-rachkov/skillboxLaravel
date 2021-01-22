@component('mail::message')
    # Cтатья "{{$post->name}}" Была удалена

    {{$post->shot_desc}}

    С уважением,<br>
    команда сайта {{ config('app.name') }}
@endcomponent
