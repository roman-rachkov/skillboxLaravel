@extends('layouts.master')

@section('page')
    <div class="row">
        @yield('content')

        @include('layouts.sidebar')
    </div><!-- /.row -->
@endsection
