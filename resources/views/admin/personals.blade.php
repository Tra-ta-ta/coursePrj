@extends('loyauts.formsite')
@section('title', 'Номера')
@section('content')
    <div class="container">
        @if (session('status'))
            {{ session('status') }}
        @endif

        <div class="row mt-3">
            <div class="col-2">
                <a href="{{ route('personal.create') }}" class="btn btn-success">Добавить персонал</a>
            </div>
            <div class="col">
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
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row"> {{ $user->id }}</th>
                                <td>{{ $user->surname }} {{ $user->name }} {{ $user->thirdname }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->login }}</td>
                                <td>
                                    <form action="{{ route('personal.destroy', $user->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <a class="btn btn-secondary"
                                            href="{{ route('personal.edit', $user->id) }}">Изменить</a>
                                        <button type="submit" class="btn btn-danger">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <div class="row text-center">
            {{ $users->links() }}
        </div>


    </div>

@endsection
