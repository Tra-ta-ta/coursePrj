@extends('loyauts.formsite')
@section('title', 'Бронирование')
@section('content')

    <div class="container">
        <main class="form-signin w-100 m-auto">
            <form method="POST" action="{{ route('order.store') }}">
                @csrf
                <h1 class="h3 mb-3 mt-3 fw-normal">Бронирование</h1>
                @if (session('status'))
                    <div class="text-danger">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="text" name="idUser" value="{{ Auth::user()->id }}" hidden>
                <div class="form-floating mt-3">
                    <textarea rows="4" name="message" class="form-control" id="floatingInput">{{ old('message') }}</textarea>
                    <label for="floatingInput">Сообщение</label>
                </div>
                @error('message')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-floating mt-3">
                    <input type="date" name="onDate" class="form-control" id="floatingInput"
                        value="{{ old('onDate') }}">
                    <label for="floatingInput">Дата заезда</label>
                </div>
                @error('onDate')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-floating mt-3">
                    <input type="number" name="duration" class="form-control" id="floatingInput"
                        value="{{ old('duration') }}">
                    <label for="floatingInput">Длительность прибывания (количество дней)</label>
                </div>
                @error('duration')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="form-floating mt-3">
                    <select name="idTypeRoom" class="form-select" id="floatingInput">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">
                                {{ $type->typeRoom }}</option>
                        @endforeach
                    </select>
                    <label for="floatingInput">Тип номера</label>
                </div>
                @error('idTypeRoom')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <button class="mt-3 btn btn-primary w-100 py-2" type="submit">Забронировать</button>
            </form>
        </main>
    </div>
@endsection
