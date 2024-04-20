@extends('layout')

@section('title')
    Главная
@endsection

@section('main_content')
    <div class="col-lg-8 mx-auto p-3 py-md-5">


        <main>
            <h1><b>Бронирование мест для коворкинга</b></h1>
            <p class="fs-5 col-md-8">
                Добро пожаловать на наш сайт для бронирования мест в коворкинге! У нас вы можете легко и удобно выбрать и
                забронировать рабочее место для коворкинга. </p>

            <div class="mb-5">
                <a href="/reserve" class="btn btn-primary btn-lg px-4">Начать</a>
            </div>

            <hr class="col-3 col-md-2 mb-5">

            <div class="row g-5">
                <div class="col-md-6">
                    <h2>Телеграм бот</h2>
                    <p>У нас есть <a href="/">Telegram бот</a>, который поможет вам быстро забронировать подходящее
                        место в коворкинге прямо из вашего мессенджера.</p>
                </div>

                <div class="col-md-6">
                    <h2>Отзывы</h2>
                    <p>На нашем сайте также доступна <a href="/review">страница отзывов</a>, где вы можете ознакомиться с
                        мнениями других пользователей о коворкингах, а также поделиться своим опытом.</p>
                </div>
            </div>
        </main>
        <footer class="pt-5 my-5 text-muted border-top">
            Created by <i><b>кириллка2005, володька2004 и едик2004</b></i>
        </footer>
    </div>
@endsection
