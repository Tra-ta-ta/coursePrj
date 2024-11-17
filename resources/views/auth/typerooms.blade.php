@extends('loyauts.formsite')
@section('title', 'Наши номера')
@section('content')
    <div class="container">


        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach

        <main class="form-signin w-100 m-auto">
            <div class="container">

                <div class="row">
                    @foreach ($typerooms as $typeroom)
                        <div class="col-4">
                            <div class="card mt-3">
                                <div class="card-header">"{{ $typeroom->typeRoom }}"</h2>
                                    <div class="card-body text-center" id="floatingInput">
                                        <p class="card-text">Описание: {{ $typeroom->description }}</p>
                                        <p class="card-text">Цена: {{ $typeroom->price }}р.</p>
                                        @if (Auth::user()->currentRoom() == null)
                                            <a href="{{ route('order.create') }}" class="btn btn-success" disabled>Перейти к
                                                бронированию</a>
                                        @else
                                            <a href="{{ route('order.create') }}" class="btn btn-success">Перейти к
                                                бронированию</a>
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
