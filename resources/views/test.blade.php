@extends('layout')

@section('title')
    Тест
@endsection

@section('main_content')
    <div class="col-lg-8 mx-auto p-3 py-md-5">
        <main>
            @php
                use App\Models\TestModel;
                foreach ($tests as $test) {
                    echo $test->name, ' = ', $test->number, '<br>';
                }
            @endphp

            <form action="{{ route('reserve_check_2') }}" method="POST">
                <input type="date" id="selected_date" name="selected_date">
                <select name="selected_place" id="selected_place"></select>
                <input type="text" name="userdate" id="userdate">
                <input type="text" name="userplace" id="userplace">
                <input type="submit" value="Забронировать">
            </form>


        </main>
    </div>
@endsection
