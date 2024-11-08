@extends('loyauts.formsite')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Left Panel -->
            <div class="col-md-8 border p-4">
                <!-- Content for the left panel -->
            </div>
            <!-- Right Panel (Login Form) -->
            <div class="col-md-4 border p-4 text-center">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Логин" name="login">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Пароль" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>
            </div>
        </div>
    </div>
@endsection('content')
