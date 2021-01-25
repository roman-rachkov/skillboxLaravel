<div class="mb-3">
    <label for="post-slug" class="form-label">Адрес статьи</label>
    <div class="input-group has-validation">
        <span id="slug-help" class="input-group-text">/posts/</span>
        <input type="text" class="form-control @error('slug') is-invalid @enderror"
               id="post-slug"
               name="slug"
               placeholder="statiya_o_dojde"
               aria-describedby="slug-help post-slug-validation-feedback"
               required
               value="{{old('slug', $post)}}"
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
           required maxlength="100" minlength="5" value="{{old('name', $post->name)}}"
    >
    @error('name')
    <div id="post-name-validation-feedback" class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="tags" class="form-label">Теги</label>
    <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags"
           placeholder="Дождь, интересное, новости" name="tags"
           aria-describedby="tags-validation-feedback"
           value="{{old('tags', $post->tags->pluck('name')->implode(','))}}"
    >
    @error('tags')
    <div id="tags-validation-feedback" class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="short-desc" class="form-label">Краткое описание статьи</label>
    <textarea class="form-control @error('short_desc') is-invalid @enderror" id="short-desc" rows="3"
              maxlength="250" required
              aria-describedby="post-short-desc-validation-feedback"
              name="short_desc">{{old('short_desc', $post->short_desc)}}</textarea>
    @error('short_desc')
    <div id="post-short-desc-validation-feedback" class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="long-desc" class="form-label">Детальное описание статьи</label>
    <textarea class="form-control @error('long_desc') is-invalid @enderror" id="long-desc" rows="10" required
              aria-describedby="post-long-desc-validation-feedback"
              name="long_desc">{{old('long_desc', $post->long_desc)}}</textarea>
    @error('long_desc')
    <div id="post-long-desc-validation-feedback" class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-check">
    <input class="form-check-input" type="checkbox" name="published"
           checked="{{old('published', $post->published)}}"
           value="1"
           id="published">
    <label class="form-check-label" for="published">
        Опубликованно
    </label>
</div>
<button type="submit" class="btn btn-primary">Сохранить</button>

@push('scripts')
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
        });
    </script>
@endpush
