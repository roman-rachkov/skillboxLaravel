@extends('layouts.front')

@section('title', 'Регистрация')

@section('content')

    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            @yield('title')
        </h3>
        <hr>

        <form action="{{route('user.create')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Имя</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                       placeholder="VeryCoolUserName" name="name"
                       aria-describedby="name-validation-feedback"
                       required maxlength="100" value="{{old('name')}}"
                >
                @error('name')
                <div id="name-validation-feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                       placeholder="jhon@doe.com" name="email"
                       aria-describedby="email-validation-feedback"
                       required maxlength="100" value="{{old('email')}}"
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
                       required maxlength="100" minlength="6"
                >
                @error('password')
                <div id="password-validation-feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirm-password" class="form-label">Повторите пароль</label>
                <input type="password" class="form-control @error('confirm-password') is-invalid @enderror" id="confirm-password"
                       placeholder="******" name="confirm-password"
                       aria-describedby="confirm-password-validation-feedback"
                       required maxlength="100" minlength="6"
                >
                @error('confirm-password')
                <div id="confirm-password-validation-feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        </form>

    </div>
@endsection
