@extends('loyauts.formsite')
@section('title', 'Главная')
@section('content')
    <div class="container-fluid border" style="background-color: {{ asset('images/LoginImage.png') }}">
        <h2 class="text-center">Добро пожаловать в нашу гостиницу!</h2>
    </div>
    <div class="container mt-5">
        <!-- Content Area -->

        <!-- Options Section -->
        <div class="row">
            <h1 class="text-center mb-2">Наши номера</h1>
            @foreach ($typesRoom as $typeroom)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">"{{ $typeroom->typeRoom }}"</h2>
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
                </div>
            @endforeach
        </div>




    </div>
@endsection('content')
