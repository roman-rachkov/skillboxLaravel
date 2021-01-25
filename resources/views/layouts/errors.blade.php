@if($errors->count())
    @alert
    @slot('title')
        Ошибки:
    @endslot
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endalert
@endif
