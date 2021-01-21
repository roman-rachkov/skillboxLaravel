@if($errors->count())
    <x-alert>
        <x-slot name="title">
            Ошибки:
        </x-slot>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </x-alert>
@endif
