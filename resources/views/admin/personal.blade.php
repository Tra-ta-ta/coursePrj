@extends('loyauts.formsite')
@section('title', 'Номера')
@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">ФИО</th>
                        <th scope="col">Номер телефона</th>
                        <th scope="col">Логин</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <th scope="row"> {{ $user->id }}</th>
                        <td>{{ $user->name }} {{ $user->surname }} {{ $user->thirdname }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->login }}</td>
                        <td>
                            <form action="{{ route('personal.destroy', $user->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <a class="btn btn-secondary" href="{{ route('personal.edit', $user->id) }}">Изменить</a>
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
