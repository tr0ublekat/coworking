<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    @yield('styles')
    <style>
        .backgrnd {
            background-image: url(https://www.eos-intelligence.com/wp-content/uploads/2019/10/Coworking-space.jpg);
            background-size: 88%;

        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            margin: auto;
        }

        header {
            text-align: center;
            /*background-color: #333;*/
            background-color: rgba(176, 207, 207, 1);
            /*color: white;*/
            color: black;
            padding: 10px 0;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
            /* Чтобы шапка накладывалась поверх других элементов */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: rgb(87, 87, 87);
            text-decoration: none;
            padding: 10px 20px;
        }

        nav ul li a:hover {
            background-color: rgb(151, 180, 180);
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body
    style="background-image: linear-gradient(to right, rgba(255,255,255, 0.35) 0 100%), url(https://www.eos-intelligence.com/wp-content/uploads/2019/10/Coworking-space.jpg); background-size: cover;">
    {{--    <header --}}
    {{--        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom" --}}
    {{--        style="background-color: rgb(187, 218, 217);"> --}}
    {{--        <div class="col-md-3 mb-2 mb-md-0"> --}}
    {{--            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none"> --}}
    {{--                <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"> --}}
    {{--                    <use xlink:href="#bootstrap"></use> --}}
    {{--                </svg> --}}
    {{--            </a> --}}
    {{--        </div> --}}

    {{--        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0"> --}}
    {{--            <li><a href="/" class="nav-link px-2 link-secondary" style="color: rgb(89, 101, 216)">Главная</a></li> --}}
    {{--            <li><a href="/review" class="nav-link px-2" style="color: rgb(89, 101, 216)">Отзывы</a></li> --}}
    {{--            <li><a href="/about" class="nav-link px-2" style="color: rgb(89, 101, 216)">О нас</a></li> --}}
    {{--        </ul> --}}

    {{--        <div class="col-md-3 text-end"> --}}

    {{--        </div> --}}
    {{--    </header> --}}

    <header>
        <nav>
            <ul>
                <li><a href="/about"><b>Главная</b></a></li>
                <li><a href="/reserve"><b>Бронирование</b></a></li>
                <li><a href="/review"><b>Отзывы</b></a></li>

            </ul>
        </nav>
    </header>
    <br>
    <div class="" style="background: rgba(187, 218, 217, 0.61); width: 75%; margin: auto; padding: 20px">
        <div class="">
            @yield('main_content')
        </div>
    </div>



</body>


@yield('js_scripts')
