@extends('loyauts.formsite')
@section('title', 'Услуги')
@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">#id</th>
                        <th scope="col">Услуга</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <th scope="row"> {{ $service->id }}</th>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->discriprion }}</td>
                    <td>

                        <form action="{{ route('service.destroy', $service->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <a class="btn btn-secondary" href="{{ route('service.edit', $service->id) }}">Изменить</a>
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
