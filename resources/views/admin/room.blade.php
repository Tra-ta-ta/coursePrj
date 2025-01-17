@extends('loyauts.formsite')
@section('title', 'Номера')
@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Номер номера</th>
                        <th scope="col">Тип номера</th>
                        <th scope="col">Статус</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row"> {{ $room->id }}</th>
                        <td>{{ $room->number }}</td>
                        <td>{{ $room->typeCheck()->typeRoom }}</td>
                        <td>{{ $room->statusRoom }}</td>
                        <td>
                            <form action="{{ route('room.destroy', $room->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <a class="btn btn-secondary" href="{{ route('room.edit', $room->id) }}">Изменить</a>
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
