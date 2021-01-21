@extends('layouts.master')

@section('page')
    @include('layouts.header')

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 blog-main">
                <h3 class="pb-3 mb-4 font-italic border-bottom">
                    @yield('title')
                </h3>
            @yield('content')
            </div> <!-- /.blog-main -->
            @include('layouts.sidebar')
        </div><!-- /.row -->
    </main><!-- /.container -->

    @include('layouts.footer')
@endsection
