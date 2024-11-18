@extends('loyauts.formsite')
@section('title', 'Регистрация персонала')
@section('content')
    <main class="form-signin w-100 m-auto">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('personal.store') }}">
                        @csrf
                        <h1 class="h3 mb-3 mt-3 fw-normal">Регистрация персонала</h1>
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingInput"
                                value="{{ old('name') }}">
                            <label for="floatingInput">Имя</label>
                        </div>
                        @error('surname')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="text" name="surname" class="form-control" id="floatingInput"
                                value="{{ old('surname') }}">
                            <label for="floatingInput">Фамилия</label>
                        </div>
                        @error('thirdname')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="text" name="thirdname" class="form-control" id="floatingInput"
                                value="{{ old('thirdname') }}">
                            <label for="floatingInput">Отчество</label>
                        </div>
                        @error('phone')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="form-floating mb-3">
                            <input type="text" name="phone" class="form-control" id="floatingInput"
                                value="{{ old('phone') }}">
                            <label for="floatingInput">Телефон</label>
                        </div>
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
                            <input type="password" name="password" class="form-control" id="floatingInput">
                            <label for="floatingInput">Пароль</label>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary py-2 mb-3" style="width: 300px"
                                type="submit">Зарегистрировать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection('content')
