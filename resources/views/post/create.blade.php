@extends('layouts.front')

@section('title', 'Новая статья')

@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            @yield('title')
        </h3>

        <form method="post" action="{{route('posts.store')}}">
            @csrf
            <div class="mb-3">
                <label for="post-slug" class="form-label">Адрес статьи</label>
                <div class="input-group has-validation">
                    <span id="slug-help" class="input-group-text">/page/</span>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror"
                           id="post-slug"
                           name="slug"
                           placeholder="statiya_o_dojde"
                           aria-describedby="slug-help post-slug-validation-feedback"
                           required
                           value="{{old('slug')}}"
                    >
                    @error('slug')
                    <div id="post-slug-validation-feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="post-name" class="form-label">Название статьи</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="post-name"
                       placeholder="Статья о дожде" name="name"
                       aria-describedby="post-name-validation-feedback"
                       required maxlength="100" minlength="5" value="{{old('name')}}"
                >
                @error('name')
                <div id="post-name-validation-feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="short-desc" class="form-label">Краткое описание статьи</label>
                <textarea class="form-control @error('shortDesc') is-invalid @enderror" id="short-desc" rows="3"
                          maxlength="250" required
                          aria-describedby="post-short-desc-validation-feedback"
                          name="shortDesc">{{old('shortDesc')}}</textarea>
                @error('shortDesc')
                <div id="post-short-desc-validation-feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="long-desc" class="form-label">Детальное описание статьи</label>
                <textarea class="form-control @error('longDesc') is-invalid @enderror" id="long-desc" rows="10" required
                          aria-describedby="post-long-desc-validation-feedback"
                          name="longDesc">{{old('longDesc')}}</textarea>
                @error('longDesc')
                <div id="post-long-desc-validation-feedback" class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="published" checked="{{old('published')}}"
                       value="1"
                       id="published">
                <label class="form-check-label" for="published">
                    Опубликованно
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>

    </div><!-- /.blog-main -->
@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            const postNameField = $('#post-name');
            const postSlugField = $('#post-slug');
            postNameField.liTranslit({
                elAlias: postSlugField
            });
            postNameField.keyup(function (e) {
                postSlugField.change();
            })
            // postSlugField.change(function () {
            //     let text = postSlugField.val() === '' ? '/page/statiya_o_dojde' : '/page/' + postSlugField.val()
            //     $('#slug-help').text(text);
            // });
        });
    </script>
@endsection
