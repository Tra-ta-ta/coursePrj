@extends('loyauts.formsite')
@section('title', 'Личный кабинет')

@section('content')
    <div class="container-fluid" style="background-color:  #ffcc99;">
        @if (session('status'))
            <div class="row">
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <div class="container">
            <div class="row pb-3">
                <div class="col-12 mt-3">
                    <div class="card pb-3">
                        <h1 class="card-header text-center">Личный кабинет</h1>
                        <div class="card-body">
                            <p>Имя - {{ Auth::user()->name }}</p>
                            <p>Фамилия - {{ Auth::user()->surname }}</p>
                            <p>Отчество - {{ Auth::user()->thirdname }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <div class="card pb-3">
                        <h1 class="card-header">История заказов</h1>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Тип номера</th>
                                        <th scope="col">Сообщение</th>
                                        <th scope="col">Дата заезда</th>
                                        <th scope="col">Длительность</th>
                                        <th scope="col">Номер</th>
                                        <th scope="col">Статус</th>
                                        <th scope="col">Действия</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td> {{ $order->checkType()->typeRoom }}</td>
                                            <td>{{ $order->message }}</td>
                                            <td>{{ $order->onDate }}</td>
                                            <td>{{ $order->duration }}</td>
                                            <td>
                                                @if ($room = $order->checkRoom())
                                                    {{ $room->number }}
                                                @endif
                                            </td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                @if ($order->status == 'Новый')
                                                    <form action="{{ route('order.destroy', $order->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger">Удалить</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-3">
                <div class="col-12 text-center">
                    <div class="card pb-3">
                        <h1 class="card-header">История заказа услуг</h1>
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">Услуга</th>
                                        <th scope="col">Номер</th>
                                        <th scope="col">Статус</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($orders_on_service as $order)
                                        <tr>
                                            <td> {{ $order->checkService()->name }}</td>
                                            <td>
                                                @if ($room = $order->checkRoom())
                                                    {{ $room->number }}
                                                @endif
                                            </td>
                                            <td>{{ $order->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
