@extends('loyauts.formsite')
@section('title', 'Наши номера')
@section('content')
    <div class="container">


        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach

        <main class="form-signin w-100 m-auto">
            <div class="container-fluid pt-3">

                <div class="row">
                    @foreach ($typerooms as $typeroom)
                        <div class="col-md-4">
                            <div class="card">
                                <h3 class="card-header text-center">"{{ $typeroom->typeRoom }}"</h3>
                                <div class="card-body text-center">
                                    <img src="{{ asset('images/' . $typeroom->image) }}" alt="" width="250"
                                        height="300">
                                    <p class="card-text">Описание: {{ $typeroom->description }}</p>
                                    <p class="card-text">Цена: {{ $typeroom->price }}р.</p>
                                    @auth
                                        @if (Auth::user()->currentRoom() == null)
                                            <a href="{{ route('order.create') }}" class="btn btn-success" disabled>Перейти к
                                                бронированию</a>
                                        @else
                                            <a href="{{ route('order.create') }}" class="btn btn-success">Перейти к
                                                бронированию</a>
                                        @endif
                                    @endauth

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </main>
    </div>
@endsection
