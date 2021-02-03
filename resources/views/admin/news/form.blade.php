<div class="mb-3">
    <label for="news-slug" class="form-label">Адрес новости</label>
    <div class="input-group has-validation">
        <span id="slug-help" class="input-group-text">/news/</span>
        <input type="text" class="form-control @error('slug') is-invalid @enderror"
               id="news-slug"
               name="slug"
               placeholder="statiya_o_dojde"
               aria-describedby="slug-help news-slug-validation-feedback"
               required
               value="{{old('slug', $news)}}"
        >
        @error('slug')
        <div id="news-slug-validation-feedback" class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
</div>
<div class="mb-3">
    <label for="news-title" class="form-label">Заголовок новости</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="news-title"
           placeholder="Новости о дожде" name="title"
           aria-describedby="news-title-validation-feedback"
           required maxlength="100" minlength="5" value="{{old('title', $news->title)}}"
    >
    @error('title')
    <div id="news-title-validation-feedback" class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="tags" class="form-label">Теги</label>
    <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags"
           placeholder="Дождь, интересное, новости" name="tags"
           aria-describedby="tags-validation-feedback"
           value="{{old('tags', $news->tags->pluck('name')->implode(','))}}"
    >
    @error('tags')
    <div id="tags-validation-feedback" class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="short-desc" class="form-label">Краткое описание новости</label>
    <textarea class="form-control @error('short_desc') is-invalid @enderror" id="short-desc" rows="3"
              maxlength="255" required
              aria-describedby="news-short-desc-validation-feedback"
              name="short_desc">{{old('short_desc', $news->short_desc)}}</textarea>
    @error('short_desc')
    <div id="news-short-desc-validation-feedback" class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="mb-3">
    <label for="long-desc" class="form-label">Детальное описание новости</label>
    <textarea class="form-control @error('long_desc') is-invalid @enderror" id="long-desc" rows="10" required
              aria-describedby="news-long-desc-validation-feedback"
              name="long_desc">{{old('long_desc', $news->long_desc)}}</textarea>
    @error('long_desc')
    <div id="news-long-desc-validation-feedback" class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>
<div class="form-check">
    <input class="form-check-input" type="checkbox" name="published"
           checked="{{old('published', $news->published)}}"
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
            const newsNameField = $('#news-title');
            const newsSlugField = $('#news-slug');
            newsNameField.liTranslit({
                elAlias: newsSlugField
            });
            newsNameField.keyup(function (e) {
                newsSlugField.change();
            })
        });
    </script>
@endpush
