@extends('loyauts.formsite')
@section('content')
    <div class="container mt-5">
        <!-- Top Bar -->
        <div class="d-flex justify-content-start mb-3">
            <span class="circle-icon"></span>
        </div>
        <!-- Contact Form -->
        <form action="{{ route('createBron') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="message" class="form-label">Сообщение</label>
                <textarea class="form-control" id="Message" rows="4" name="Message"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Выберите день и номер</label>
                <input type="date" class="form-control" name="onDate">
            </div>
            <div class="mb-3">
                <select class="form-select" name="TypeRoom_idTypeRoom">
                    <option selected>Список номеров</option>
                    <option value="1">Room 1</option>
                    <option value="2">Room 2</option>
                    <option value="3">Room 3</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Сколько дней вы планируете проживать?</label>
                <input type="number" class="form-control" name="Duration">
            </div>

            <button type="submit" class="btn btn-primary">Отправить запрос на бронирование</button>
        </form>
    </div>
@endsection('content')
