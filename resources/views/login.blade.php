@extends('loyauts.formsite')
@section('title', 'Вход')
@section('content')
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1 class="h3 mb-3 mt-3 fw-normal">Вход</h1>
                        @error('login')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="text" name="login" class="form-control" id="floatingInput"
                                value="{{ old('login') }}">
                            <label for="floatingInput">Логин</label>
                        </div>
                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="floatingPassword">
                            <label for="floatingPassword">Пароль</label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary py-2" style="width: 200px" type="submit">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
@endsection('content')
