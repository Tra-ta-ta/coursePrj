<table class="table table-sm">
    <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Услуга</th>
            <th scope="col">Статус</th>
            <th scope="col">Номер</th>
            <th scope="col">Дата запроса услуги</th>
            <th scope="col">Общее количество</th>
            <th scope="col">{{ $orders->count() }}</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($orders as $order)
            <tr>
                <th scope="row"> {{ $order->id }}</th>
                <td>{{ $order->checkService()->name }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    @if ($room = $order->checkRoom())
                        {{ $room->number }}
                    @endif
                </td>
                <td>{{ $order->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
