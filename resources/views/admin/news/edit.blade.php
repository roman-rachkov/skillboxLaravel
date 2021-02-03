@extends('layouts.front')

@section('title', 'Редктирование новости')

@section('content')
    <form method="post" action="{{route('admin.news.update', ['news'=>$news])}}">
        @csrf
        @method('patch')
        <input type="hidden" value="{{$news->id}}" name="id">
        @include('admin.news.form', ['news'=>$news])
    </form>
@endsection
