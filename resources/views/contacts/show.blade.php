@extends('layouts.front')

@section('title', 'Контакты')

@section('content')

        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et id nam quos repudiandae soluta, totam. Accusamus aliquid amet asperiores aut, dicta distinctio dolorum eaque ex fugit hic illum ipsa maiores nesciunt nostrum odio, odit omnis perspiciatis quaerat quis rerum sint sunt tempore totam ut vitae? Beatae ipsa nisi similique. Alias commodi consequuntur, corporis dicta dignissimos doloremque dolores doloribus enim et fuga hic iusto labore necessitatibus nobis quisquam repellendus, temporibus ut, voluptate voluptatibus voluptatum. At beatae culpa cum, ducimus esse et expedita facere harum hic id incidunt laborum magnam mollitia nobis obcaecati odit officiis provident quam quibusdam quos ratione recusandae tempora voluptate? Consequuntur corporis deserunt dicta dolor doloribus dolorum ea earum eligendi fugit id iure laborum nesciunt nihil, nobis nostrum officiis, optio quasi quidem quos reiciendis rerum saepe similique sit suscipit tempore vitae voluptas voluptates. Accusantium amet consequatur corporis ea earum eius eligendi ex facilis fuga fugit id illum inventore maiores minus, necessitatibus, porro rerum sed sequi sit tenetur. Adipisci assumenda culpa perferendis perspiciatis quia saepe velit? Aut blanditiis dolore ducimus est laudantium molestiae necessitatibus nobis quaerat sed temporibus. Ad consequatur consequuntur fuga, harum inventore magni maiores quaerat! Accusantium distinctio eius, illum, in ipsam laboriosam omnis optio perferendis similique, temporibus ullam voluptatem voluptates! Alias magnam modi sequi unde velit. Aliquid at earum est facilis fugiat fugit, magni omnis placeat provident quas quos rerum saepe, sapiente sint soluta. Ipsum itaque iure iusto labore nihil numquam odit ratione voluptate! Ab accusantium alias at atque consequatur consequuntur delectus deleniti deserunt dolor, dolorem doloremque eaque eum laudantium maxime odit porro quaerat quasi quis quisquam quo ratione saepe similique tempora tenetur ullam? Atque consequuntur delectus doloremque ducimus ea eaque enim explicabo fugit illo, iste itaque iusto libero maxime modi molestias, nemo numquam odio odit officia possimus, quae quo ratione sapiente sint sunt tenetur ut voluptatem? Quia!
        </p>
        <hr>
            <form method="post" action="{{route('Store message')}}">
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
                <div class="mb-3">
                    <label for="message" class="form-label">Сообщение</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" rows="3"
                              maxlength="250" required
                              aria-describedby="message-validation-feedback"
                              name="message">{{old('message')}}</textarea>
                    @error('message')
                    <div id="message-validation-feedback" class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>&nbsp;&nbsp;
                <a href="#" onclick="history.back()">Вернуться назад</a>

            </form>

@endsection
