@extends('layout')

@section('title')
    Бронирование
@endsection

@section('styles')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 42px;
            height: 22px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 2px;
            bottom: 2px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(18px);
            -ms-transform: translateX(18px);
            transform: translateX(18px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 22px;
        }

        .slider.round:before {
            border-radius: 38px;
        }

        .flex-container {
            display: flex;
            flex-direction: row;
            align-items: stretch;
            column-gap: 50px;
        }
    </style>
@endsection

@section('main_content')

    <h1 class="madimi-one-regular" style="text-align:center; color:rgb(65, 65, 65)"><b>Бронирование мест</b></h1>
    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        $timestamp = time();
        $ourdate = date('Y-m-d', $timestamp);
        if (!isset($userids)) {
            $userids = '';
        }
        if (!isset($userdate)) {
            $userdate = $ourdate;
        }
        if (!isset($userplace)) {
            $userplace = 1;
        }
    @endphp


    {{-- Стандартный ввод --}}

    {{-- <form action="{{ route('reserve_check') }}" method="POST">
        @csrf
        <label for="">Data: </label>
        <input type="date" id="data" name="data">
        <br>
        <label for="">Slot: </label>
        <select name="slot_id" id="slot_id">
            <option value="1">A1</option>
            <option value="2">A2</option>
            <option value="3">A3</option>
        </select>
        <br>
        <label for="">UIDs: </label>
        <input type="text" name="UIDs" required>
        <br>
        <label for="">Time: </label>
        <input type="number" name="reserve_time" required>
        <br>
        <button type="submit">Забронировать</button>

    </form> --}}

    <div class="flex-container" style="column-gap: 100px; padding-left: 40px">

        <form id="date_form" action="/save-date" method="POST">
            @csrf
            <b style="font-size: 26px; color:rgb(65, 65, 65)">Введите дату: </b><br><br>
            <input type="date" id="selected_date" name="selected_date" value="<?php echo $userdate; ?>" class="form-control"
                style="width: 170px; background: rgb(176, 207, 207); font-size:20px;" min="<?php echo date('Y-m-d'); ?>"><br>
            <b style="font-size: 26px; color:rgb(65, 65, 65)">Выберите место: </b><br><br>
            <select name="selected_place" id="selected_place" class="form-control"
                style="width: 140px; background: rgb(176, 207, 207); font-size:20px;">
                <option value="1" @if ($userplace == 1) selected @endif>Место - A1</option>
                <option value="2" @if ($userplace == 2) selected @endif>Место - A2</option>
                <option value="3" @if ($userplace == 3) selected @endif>Место - A3</option>
                <option value="4" @if ($userplace == 4) selected @endif>Место - A4</option>
                <option value="5" @if ($userplace == 5) selected @endif>Место - B1</option>
                <option value="6" @if ($userplace == 6) selected @endif>Место - B2</option>
                <option value="7" @if ($userplace == 7) selected @endif>Место - B3</option>
                <option value="8" @if ($userplace == 8) selected @endif>Место - B4</option>
                <option value="9" @if ($userplace == 9) selected @endif>Место - C1</option>
            </select>
            <br>
            {{-- <b style="font-size: 26px; color:rgb(65, 65, 65)">Введите номера студенческих билетов: </b><br>
            <textarea name="selected_ids" id="selected_ids" cols="30" rows="3" maxlength="120" class="form-control"
                style="width: 370px; background: rgb(176, 207, 207); font-size:20px;">{{ $userids }}</textarea> --}}
            <br><br>

        </form>

        <form action="{{ route('reserve_check_2') }}" method="POST">
            @csrf
            <div class="flex-container">
                <div>
                    <b style="font-size: 26px; color:rgb(65, 65, 65)">Введите номера студенческих билетов: </b><br><br>
                    <textarea placeholder="Например: 19202211, 19202420, и т.д." name="userids" id="userids" cols="30" rows="5"
                        maxlength="120" class="form-control" style="width: 500px; background: rgb(176, 207, 207); font-size:20px;">{{ $userids }}</textarea>
                </div>
                <div>
                    @for ($i = 1; $i <= 6; $i++)
                        @php
                            $temp = $reserves
                                ->where('data', $userdate)
                                ->where('slot_id', $userplace)
                                ->where('reserve_time', $i)
                                ->first();
                        @endphp
                        @if (!isset($temp))
                            <label class="switch">
                                <input type="checkbox" value="{{ $i }}" name="usertime[]"
                                    id="usertime{{ $i }}">
                                <span class="slider round"></span>
                            </label>
                            <b
                                style="color:rgb(65, 65, 65); font-size: 26px;">{{ 7 + $i }}:00-{{ 8 + $i }}:00</b>
                            <br>
                        @else
                            <label class="switch">
                                <input type="checkbox" value="{{ $i }}" name="usertime[]"
                                    id="usertime{{ $i }}" disabled>
                                <span class="slider round" style="background-color: rgba(255, 0, 0, 0.8);"></span>
                            </label>
                            <b
                                style="color:rgb(65, 65, 65); font-size: 26px;">{{ 7 + $i }}:00-{{ 8 + $i }}:00</b>
                            <br>
                        @endif
                    @endfor
                </div>
                <div>
                    @for ($i = 7; $i <= 12; $i++)
                        @php
                            $temp = $reserves
                                ->where('data', $userdate)
                                ->where('slot_id', $userplace)
                                ->where('reserve_time', $i)
                                ->first();
                        @endphp
                        @if (!isset($temp))
                            <label class="switch">
                                <input type="checkbox" value="{{ $i }}" name="usertime[]"
                                    id="usertime{{ $i }}">
                                <span class="slider round"></span>
                            </label>
                            <b
                                style="color:rgb(65, 65, 65); font-size: 26px;">{{ 7 + $i }}:00-{{ 8 + $i }}:00</b>
                            <br>
                        @else
                            <label class="switch">
                                <input type="checkbox" value="{{ $i }}" name="usertime[]"
                                    id="usertime{{ $i }}" disabled>
                                <span class="slider round" style="background-color: rgba(255, 0, 0, 0.8);"></span>
                            </label>
                            <b
                                style="color:rgb(65, 65, 65); font-size: 26px;">{{ 7 + $i }}:00-{{ 8 + $i }}:00</b>
                            <br>
                        @endif
                    @endfor
                    <div align="right">
                        <br><br>
                        <input type="text" name="userdate" id="userdate" hidden value="{{ $userdate }}">
                        <input type="text" name="userplace" id="userplace" hidden value="{{ $userplace }}">

                        {{-- <input type="hidden" name="userids" id="userids" value="{{ $userids }}"> --}}
                        <input type="submit" value="Забронировать" class="btn btn-primary mb-2">
                    </div>



                </div>
            </div>


            {{-- <br><br>
            <input type="text" name="userdate" id="userdate" hidden value="{{ $userdate }}">
            <input type="text" name="userplace" id="userplace" hidden value="{{ $userplace }}">

            <input type="hidden" name="userids" id="userids" value="{{ $userids }}">
            <input type="submit" value="Забронировать" class="btn btn-primary mb-2"> --}}


        </form>
    </div>
    <br>
    <div>
        <h1 class="madimi-one-regular" style="text-align:center; color:rgb(65, 65, 65)"><b>План помещения</b></h1><br>
        <img src="{{ url('/images/room1.jpg') }}"
            style="width: 50%; border-style: solid; border-color: rgb(102, 102, 102); display: block; margin-left: auto; margin-right: auto">
        <br><br><br>
    </div>

@endsection


@section('js_scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#date_form').on('change', '#selected_date, #selected_place', function() {
                $('#date_form').attr('method', 'POST').submit();
            });
        });
    </script>
@endsection
