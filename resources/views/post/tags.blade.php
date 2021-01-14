@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    @foreach($tags as $tag)
        <a href="{{route('tag', ['tag'=>$tag->getRouteKey()])}}"><span class="badge bg-secondary">{{$tag->name}}</span></a>
    @endforeach
@endif
