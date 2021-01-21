@if(session()->has('message'))
    <x-alert>
        <x-slot name="type">
            {{session('message_type')}}
        </x-slot>
        {{session('message')}}
    </x-alert>
@endif
