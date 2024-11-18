@extends('loyauts.formsite')
@section('title', 'Номера')
@section('content')
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <form method="POST" action="{{ route('personal.update', $user->id) }}">
                @method('PUT')
                @csrf
                <h1 class="h3 mb-3 mt-3 fw-normal">Изменить сотрудника: {{ $user->surname }} {{ $user->name }}
                    {{ $user->thirdname }}</h1>
                @error('phone')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-floating mb-3">
                    <input type="text" name="phone" class="form-control" id="floatingInput" value="{{ $user->phone }}">
                    <label for="floatingInput">Номер телефона</label>
                </div>
                @error('login')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-floating mb-3">
                    <input type="text" name="login" class="form-control" id="floatingInput"
                        value="{{ $user->login }}">
                    <label for="floatingInput">Логин</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="password" class="form-control" id="floatingInput">
                    <label for="floatingInput">Поставить новый пароль</label>
                </div>
                <div class="text-center">
                    <button class="mt-3 btn btn-primary py-2" style="width: 200px" type="submit">Изменить</button>
                </div>
            </form>
        </main>
    </div>
@endsection
