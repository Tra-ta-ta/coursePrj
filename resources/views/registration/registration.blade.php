@extends('loyauts.formsite')
@section('title', 'Регистрация')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif
    <main class="form-signin w-100 m-auto">
        <form method="POST" action="{{ route('registration') }}">
            @csrf
            <h1 class="h3 mb-3 mt-3 fw-normal">Please sign in</h1>
            <div class="form-floating">
                <input type="text" name="name" class="form-control" id="floatingInput" value="{{ old('name') }}">
                <label for="floatingInput">Имя</label>
            </div>
            <div class="form-floating">
                <input type="text" name="surname" class="form-control" id="floatingInput" value="{{ old('surname') }}">
                <label for="floatingInput">Фамилия</label>
            </div>
            <div class="form-floating">
                <input type="text" name="thirdname" class="form-control" id="floatingInput"
                    value="{{ old('thirdname') }}">
                <label for="floatingInput">Отчество</label>
            </div>
            <div class="form-floating">
                <input type="text" name="phone" class="form-control" id="floatingInput" value="{{ old('phome') }}">
                <label for="floatingInput">Телефон</label>
            </div>
            <div class="form-floating">
                <input type="text" name="login" class="form-control" id="floatingInput" value="{{ old('login') }}">
                <label for="floatingInput">Логин</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Пароль</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
        </form>
    </main>

@endsection('content')
