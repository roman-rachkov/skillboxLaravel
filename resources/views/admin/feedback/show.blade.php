@extends('layouts.admin')

@section('title', 'Список обращений')

@section('content')

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">email</th>
            <th scope="col">Сообщение</th>
            <th scope="col">Дата</th>
        </tr>
        </thead>
        <tbody>
        @foreach($feedbacks as $feedback)
        @include('admin.feedback.single')
        @endforeach
        </tbody>
    </table>

@endsection
