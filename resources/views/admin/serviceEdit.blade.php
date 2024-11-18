@extends('loyauts.formsite')
@section('title', 'Услуги')
@section('content')
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <form method="POST" action="{{ route('service.update', $service->id) }}">
                @method('PUT')
                @csrf
                <h1 class="h3 mb-3 mt-3 fw-normal">Изменить услугу №{{ $service->id }}</h1>
                @error('name')
                    <h3>{{ $message }}</h3>
                @enderror
                <div class="form-floating mt-3">
                    <input type="text" name="name" class="form-control" id="floatingInput" value="{{ $service->name }}">
                    <label for="floatingInput">Название</label>
                </div>
                @error('discriprion')
                    <h3>{{ $message }}</h3>
                @enderror
                <div class="form-floating mt-3">
                    <input type="text" name="discriprion" class="form-control" id="floatingInput"
                        value="{{ $service->discriprion }}">
                    <label for="floatingInput">Описание</label>
                </div>
                <div class="text-center">
                    <button class="mt-3 btn btn-primary py-2" style="width: 200px" type="submit">Изменить</button>
                </div>
            </form>
        </main>
    </div>
@endsection
