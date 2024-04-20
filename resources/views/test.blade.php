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
        </main>
    </div>
@endsection
