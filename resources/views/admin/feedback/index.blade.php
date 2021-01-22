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
        @each('admin.feedback.single', $feedbacks, 'feedback')
        </tbody>
    </table>

@endsection
