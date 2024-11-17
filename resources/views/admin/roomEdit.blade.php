@extends('loyauts.formsite')
@section('title', 'Номера')
@section('content')
    <div class="container">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach

        <main class="form-signin w-100 m-auto">
            <form method="POST" action="{{ route('room.update', $room->id) }}">
                @method('PUT')
                @csrf
                <h1 class="h3 mb-3 mt-3 fw-normal">Изменить номер №{{ $room->number }}</h1>
                <div class="form-floating mt-3">
                    <input type="text" name="status" class="form-control" id="floatingInput"
                        value="{{ $room->statusRoom }}">
                    <label for="floatingInput">Статус</label>
                </div>
                <div class="form-floating mt-3">
                    <select name="idTypeRoom" class="form-select">
                        @foreach ($types as $type)
                            <option @if ($type->id == $room->typeRoom_idTypeRoom) selected @endif value="{{ $type->id }}">
                                {{ $type->typeRoom }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="mt-3 btn btn-primary w-100 py-2" type="submit">Изменить</button>

            </form>
        </main>
    </div>
@endsection
