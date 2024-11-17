@extends('loyauts.formsite')
@section('title', 'Заказы')
@section('content')
    <div class="container">
        @if (session('status'))
            {{ session('status') }}
        @endif
        <div class="row mt-3">
            <a class="btn btn-info" style="width: 150px" href="{{ route('createReportOrders') }}">Отчёт за месяц</a>
        </div>
        <div class="row mt-3">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Тип номера</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Занятый номер</th>
                        <th scope="col">Дата заезда</th>
                        <th scope="col">Длительность</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row"> {{ $order->id }}</th>
                            <td>{{ $order->checkType()->typeRoom }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                @if ($room = $order->checkRoom())
                                    {{ $room->number }}
                                @endif
                            </td>
                            <td>{{ $order->onDate }}</td>
                            <td>{{ $order->duration }}</td>
                            <td>
                                @if ($order->status == 'Принят')
                                    <form action="{{ route('order.destroy', $order->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Удалить</button>
                                    </form>
                                @else
                                    <a class="btn btn-secondary" href="{{ route('order.edit', $order->id) }}">Просмотр</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row text-center">
            {{ $orders->links() }}
        </div>


    </div>

@endsection
