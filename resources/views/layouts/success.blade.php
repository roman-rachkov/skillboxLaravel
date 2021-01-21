@if(session()->has('message'))
    @alert
    @slot('type')
        {{session('message_type')}}
    @endslot
    {{session('message')}}
    @endalert
@endif
