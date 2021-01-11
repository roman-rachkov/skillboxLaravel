@extends('layouts.front')

@section('title', 'Востановление пароля')

@section('content')
    <form action="{{route('password.email')}}" method="post">
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
        <button type="submit" class="btn btn-primary me-2">Отправить</button>

    </form>
@endsection
