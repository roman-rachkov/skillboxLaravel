<div class="alert alert-{{$type ?? 'danger'}}">
    @isset($title)
        <h4 class="alert-heading">{{$title}}</h4>
    @endisset
    {{ $slot }}
</div>
