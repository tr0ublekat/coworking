@extends('layout')

@section('title')
    Отзывы
@endsection

@section('main_content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/review/check">
        @csrf
        <input type="email" name="email" id="email" placeholder="Введите email" class="form-control"
            style="background: rgb(176, 207, 207);"><br>
        <input type="text" name="subject" id="subject" placeholder="Введите тему отзыва" class="form-control"
            style="background: rgb(176, 207, 207);">
        <textarea name="message" id="message" cols="30" rows="5" class="form-control"
            placeholder="Введите сообщение" style="background: rgb(176, 207, 207);"></textarea>
        <br>
        <button type="submit" class="btn btn-primary mb-2">Отправить</button>
    </form>
    <br>
    <h1>Отзывы: </h1>
    @foreach ($reviews as $item)
        <div class="alert alert=warning" style="background: rgb(176, 207, 207);">
            <h3>{{ $item->subject }}</h3>
            <b>{{ $item->email }}</b>
            <h4>{{ $item->message }}</h4>
        </div>
    @endforeach

@endsection
