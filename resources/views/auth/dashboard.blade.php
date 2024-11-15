@extends('loyauts.formsite')
@section('title', 'Личный кабинет')

@section('content')

    <div class="row">
        <div class="col-12 text-center mt-3">
            <h1>Личный кабинет</h1>
            <p>Имя - {{ Auth::user()->name }}</p>
            <p>Фамилия - {{ Auth::user()->surname }}</p>
            <p>Отчество - {{ Auth::user()->thirdname }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <h1>История заказов</h1>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">Тип номера</th>
                        <th scope="col">Сообщение</th>
                        <th scope="col">Длительность</th>
                        <th scope="col">Статус</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($orders as $order)
                        <tr>
                            <td> {{ $order->checkType()->typeRoom }}</td>
                            <td>{{ $order->message }}</td>
                            <td>{{ $order->duration }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

        </div>
    </div>

@endsection
