@extends('loyauts.formsite')
@section('title', 'Главная')
@section('content')
    <div class="container-fluid border" style="background-color:  #ffcc99; height: 350px">
        <h2 class="text-center"
            style="padding-top: 135px; font-style:italic; font-family:Brush Script MT; font-weight:bold; font-size:50px">
            Добро пожаловать в
            нашу гостиницу!</h2>
    </div>
    <div class="container-fluid pt-5 pb-5" style="background-color: #ffe6cc;">
        <!-- Content Area -->

        <!-- Options Section -->
        <div class="row">
            <h1 class="text-center mb-5">Наши номера</h1>
            @foreach ($typesRoom as $typeroom)
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




    </div>
@endsection('content')
