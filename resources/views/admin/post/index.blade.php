@extends('layouts.admin')

@section('title', 'Список постов')

@section('content')
    <table class="table table-hover table-responsive">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Краткое описание</th>
            <th scope="col">Дата публикации</th>
            <th scope="col">Управление</th>
        </tr>
        </thead>
        <tbody>
        @each('admin.post.single', $posts, 'post')
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        function changePublish(element){
            $(document).ready(function ($){
                let formData = new FormData;
                formData.append('published', $(element).is(':checked'));
                jQuery.ajax({
                    type: 'PATCH',
                    url: $(element).data('path'),
                    data: formData,
                    complete: function (){
                        location.reload();
                    }
                });
            })
        }
    </script>
@endpush
