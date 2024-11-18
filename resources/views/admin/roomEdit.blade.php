@extends('loyauts.formsite')
@section('title', 'Номера')
@section('content')
    <div class="container">
        <main class="form-signin w-100 m-auto">
            <form method="POST" action="{{ route('room.update', $room->id) }}">
                @method('PUT')
                @csrf
                <h1 class="h3 mb-3 mt-3 fw-normal">Изменить номер №{{ $room->number }}</h1>
                @error('status')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-floating mb-3">
                    <input type="text" name="status" class="form-control" id="floatingInput"
                        value="{{ $room->statusRoom }}">
                    <label for="floatingInput">Статус</label>
                </div>
                @error('idTypeRoom')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-floating mb-3">
                    <select name="idTypeRoom" class="form-select">
                        @foreach ($types as $type)
                            <option @if ($type->id == $room->typeRoom_idTypeRoom) selected @endif value="{{ $type->id }}">
                                {{ $type->typeRoom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button class="mt-3 btn btn-primary py-2" style="width: 200px" type="submit">Изменить</button>
                </div>
            </form>
        </main>
    </div>
@endsection
