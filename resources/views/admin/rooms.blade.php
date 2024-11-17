@extends('loyauts.formsite')
@section('title', 'Номера')
@section('content')
    <div class="container">
        @if (session('status'))
            {{ session('status') }}
        @endif
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
                    @foreach ($rooms as $room)
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
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row text-center">
            {{ $rooms->links() }}
        </div>


    </div>

@endsection
