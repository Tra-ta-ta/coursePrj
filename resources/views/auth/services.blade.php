@extends('loyauts.formsite')
@section('title', 'Заказ услуг')
@section('content')
    <div class="container">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach

        <main class="form-signin w-100 m-auto">
            <div class="container">

                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-4">
                            <form method="POST" action="{{ route('orderService.store') }}">
                                @csrf
                                <input type="text" hidden value="{{ $service->id }}" name="idService">
                                <input type="text" hidden value="{{ Auth::user()->id }}" name="idUser">
                                <input type="text" hidden
                                    value="@if ($room = Auth::user()->currentRoom()) {{ $room->id }} @endif" name="idRoom">
                                <div class="card mt-3">
                                    <div class="card-header">Услуга "{{ $service->name }}"</h2>
                                        <div class="card-body" id="floatingInput">
                                            <p class="card-text">Описание: {{ $service->discriprion }}</p>
                                            @if (Auth::user()->currentRoom() == null)
                                                <button type="submit" class="btn btn-success" disabled>Заказать в
                                                    номер</button>
                                            @else
                                                <button type="submit" class="btn btn-success">Заказать в
                                                    номер</button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>

            </div>
        </main>
    </div>
@endsection
