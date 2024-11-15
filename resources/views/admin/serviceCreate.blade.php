@extends('loyauts.formsite')
@section('title', 'Услуги')
@section('content')


    <main class="form-signin w-100 m-auto">
        <form method="POST" action="{{ route('service.store') }}">
            @csrf
            <h1 class="h3 mb-3 mt-3 fw-normal">Добавление услуги</h1>
            @error('name')
                <h3>{{ $message }}</h3>
            @enderror
            <div class="form-floating mt-3">
                <input type="text" name="name" class="form-control" id="floatingInput" value="{{ old('name') }}">
                <label for="floatingInput">Название</label>
            </div>
            @error('discriprion')
                <h3>{{ $message }}</h3>
            @enderror
            <div class="form-floating mt-3">
                <input type="text" name="discriprion" class="form-control" id="floatingInput"
                    value="{{ old('discriprion') }}">
                <label for="floatingInput">Описание</label>
            </div>
            <button class="mt-3 btn btn-primary w-100 py-2" type="submit">Добавить</button>
        </form>
    </main>

@endsection
