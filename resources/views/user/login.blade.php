@extends('layouts.front')

@section('title', 'Вход')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            @yield('title')
        </h3>
        <hr>

        <form action="{{route('user.auth')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                       placeholder="jhon@doe.com" name="email"
                       aria-describedby="email-validation-feedback"
                       required maxlength="100" minlength="5" value="{{old('email')}}"
                >
                @error('email')
                <div id="email-validation-feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                       placeholder="******" name="password"
                       aria-describedby="password-validation-feedback"
                       required maxlength="100" minlength="6" value="{{old('password') ?? $email ?? ''}}"
                >
                @error('password')
                <div id="password-validation-feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>

    </div>
@endsection
