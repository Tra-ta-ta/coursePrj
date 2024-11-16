@extends('loyauts.formforpersonal')
@section('title', 'Заказы услуг')
@section('content')

    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach

    <main class="form-signin w-100 m-auto">
        <form method="POST" action="{{ route('orderService.update', $order->id) }}">
            @method('PUT')
            @csrf
            <h1 class="h3 mb-3 mt-3 fw-normal">Просмотр заказа "{{ $order->checkService()->name }}"</h1>
            <div class="card mt-3">
                <div class="card-header">Данные Жильца</h2>
                    <div class="card-body" id="floatingInput">
                        @if (($user = $order->checkUser()) and ($room = $order->checkRoom()))
                            <p class="card-text">Имя: {{ $user->name }}</p>
                            <p class="card-text">Фамилия: {{ $user->surname }}</p>
                            <p class="card-text">Отчество: {{ $user->thirdname }}</p>
                            <p class="card-text">Номер телефона: {{ $user->phone }}</p>
                            <p class="card-text">Номер: {{ $room->number }}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-floating mt-3">
                <div class="form-control" id="floatingInput">{{ $order->status }} </div>
                <label for="floatingInput">Статус</label>
            </div>

            <div class="form-floating mt-3">
                <select name="status" class="form-select" id="floatingInput">
                    <option value="Выполнено">Выполнено</option>
                    <option value="В процессе">В процессе</option>
                </select>
                <label for="floatingInput">Изменение статуса</label>
            </div>
            <button class="mt-3 btn btn-primary w-100 py-2" type="submit">Принять</button>
        </form>

        <form action="{{ route('orderService.destroy', $order->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="text-danger">Функция удалить доступна после выполнения!</div>
            @if ($order->status == 'Выполнено')
                <button class="mt-3 btn btn-danger w-100 py-2">Удалить</button>
            @else
                <button class="mt-3 btn btn-danger w-100 py-2" disabled>Удалить</button>
            @endif
        </form>

    </main>
@endsection
