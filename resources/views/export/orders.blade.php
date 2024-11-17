<table class="table table-sm">
    <thead>
        <tr>
            <th scope="col">#id</th>
            <th scope="col">Тип номера</th>
            <th scope="col">Статус</th>
            <th scope="col">Занятый номер</th>
            <th scope="col">Дата заезда</th>
            <th scope="col">Длительность</th>
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
            </tr>
        @endforeach
        <tr>
            <th>Общее количесво</th>
            <th>{{ $orders->count() }}</th>
        </tr>
        <tr>
            <th>Стоимость всех заказов</th>
            <th>{{ $full_price }}р.</th>
        </tr>
    </tbody>
</table>
