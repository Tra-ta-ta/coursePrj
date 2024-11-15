<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('welcome') }}">Главная</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="">Услуги</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Наши номера</a>
                        </li>
                        @auth
                            @if (Auth::user()->isUser())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('order.create') }}">Забронировать</a>
                                </li>
                            @endif
                        @endauth
                        @auth
                            @if (Auth::user()->isAdmin())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('order.index') }}">Заказы на бронь</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('room.index') }}">Управление номерами</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('service.index') }}">Управление услугами</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Управление персоналом</a>
                                </li>
                            @endif
                        @endauth

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Ещё
                            </a>
                            @auth
                                <ul class="dropdown-menu">
                                    @if (Auth::user()->isUser())
                                        <li><a class="dropdown-item" href="{{ route('login') }}">Личный кабинет</a></li>
                                    @endif

                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <li><button class="dropdown-item" type="success">Выйти</button></li>
                                    </form>
                                </ul>

                            @endauth
                            @guest
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('login') }}">Войти</a></li>
                                    <li><a class="dropdown-item" href="{{ route('registration') }}">Зарегестрироваться</a>
                                    </li>
                                </ul>
                            @endguest

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>


    </footer>
</body>

</html>
