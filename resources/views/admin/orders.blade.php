@extends('loyauts.formsite')
@section('title', 'Номера')
@section('content')
    @if (session('status'))
        {{ session('status') }}
    @endif
    <div class="row">
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
                            <a class="btn btn-secondary" href="{{ route('order.edit', $order->id) }}">Просмотр</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        {{ $orders->links() }}
    </div>




@endsection
