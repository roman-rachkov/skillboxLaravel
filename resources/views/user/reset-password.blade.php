@extends('layouts.front')

@section('title', 'Востановление пароля')

@section('content')

    <form action="{{route('password.update')}}" method="post">
        @csrf
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
            <label for="password_confirmation" class="form-label">Повторите пароль</label>
            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                   id="password_confirmation"
                   placeholder="******" name="password_confirmation"
                   aria-describedby="password_confirmation-validation-feedback"
                   required maxlength="100" minlength="6"
            >
            @error('password_confirmation')
            <div id="password_confirmation-validation-feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <input type="hidden" value="{{$token}}" name="token">
        <button type="submit" class="btn btn-primary">Обновить пароль</button>
    </form>
@endsection
