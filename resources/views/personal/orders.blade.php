@extends('loyauts.formforpersonal')
@section('title', 'Заказы услуг')
@section('content')
    @if (session('status'))
        {{ session('status') }}
    @endif
    <div class="row">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Услуга</th>
                    <th scope="col">Номер</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($orders as $order)
                    <tr>
                        <th scope="row"> {{ $order->id }}</th>
                        <td>{{ $order->checkService()->name }}</td>
                        <td>{{ $order->checkRoom()->number }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a class="btn btn-secondary" href="{{ route('orderService.edit', $order->id) }}">Просмотр</a>
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
