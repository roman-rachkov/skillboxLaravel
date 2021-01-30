@auth
    <form action="{{route('comments.store')}}" method="post">
        @csrf
        <input type="hidden" name="type" value="{{$post->type}}">
        <input type="hidden" name="id" value="{{$post->id}}">
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" rows="5" required
                      aria-describedby="comment-validation-feedback"
                      name="comment">{{old('long_desc')}}</textarea>
            @error('comment')
            <div id="comment-validation-feedback" class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Комментировать</button>

    </form>
@endauth
