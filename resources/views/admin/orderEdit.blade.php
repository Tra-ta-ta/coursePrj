@extends('loyauts.formsite')
@section('title', 'Заказы')
@section('content')
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <form method="POST" action="{{ route('order.update', $order->id) }}">
                @method('PUT')
                @csrf
                <h1 class="h3 mb-3 mt-3 fw-normal">Просмотрк заказа №{{ $order->id }}</h1>
                <div class="card mb-3">
                    <div class="card-header">Данные Жильца</div>
                        <div class="card-body" id="floatingInput">
                            @if ($user = $order->checkUser())
                                <p class="card-text">Имя: {{ $user->name }}</p>
                                <p class="card-text">Фамилия: {{ $user->surname }}</p>
                                <p class="card-text">Отчество: {{ $user->thirdname }}</p>
                                <p class="card-text">Номер телефона: {{ $user->phone }}</p>
                            @endif
                        </div>

                    </div>
                </div>
                <div class="form-floating mb-3">
                    <div class="form-control" id="floatingInput">{{ $order->status }} </div>
                    <label for="floatingInput">Статус</label>
                </div>
                @error('idRoom')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-floating mb-3">
                    <select name="idRoom" class="form-select" id="floatingInput">
                        @foreach ($rooms as $room)
                            <option value="{{ $room->id }}">Номер №{{ $room->number }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInput">Выбор свободных номеров</label>
                </div>
                @if ($rooms->all() == [])
                    <button class="mb-3 btn btn-primary w-100 py-2" type="submit" disabled>Принять</button>
                @else
                    <button class="mb-3 btn btn-primary w-100 py-2" type="submit">Принять</button>
                @endif
            </form>
            @if ($rooms->all() == [])
                <form action="{{ route('order.destroy', $order->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="mb-3 btn btn-danger w-100 py-2">Удалить</button>
                </form>
            @endif
        </main>
    </div>
@endsection
