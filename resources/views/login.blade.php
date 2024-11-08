<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body class="mybody">
    <header>


        <nav class="navbar">
            <div class="container mb-10 py-2">

                <ul class="navbar-nav">
                    <li><a href="{{ route('welcome') }}"><img src="{{ asset('images/HomePogeIcon.png') }}"
                                width="25px" height="25px"></a></li>
                </ul>

            </div>
        </nav>

    </header>
    <section>
        <div class="container-fluid px-5">
            <div class="row g-5">
                <div class="col-md-8 py-5 px-5 text-center ">
                    <img src="{{ asset('images/LoginImage.png') }}" width="50%">
                </div>
                <div class="col-6 col-md-4">
                    <h3 class="my-5 mx-3">Вход в систему</h3>
                    <form action="{{ route('login') }}" method="post" class="login_form">
                        @csrf
                        <input type="text" name="login" id="login_input" class="form-control mb-2" required>
                        <input type="password" name="password" id="password_input" class="form-control mb-2" required>
                        <button type="submit" class="btn btn-success">Войти</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>

    </footer>
</body>

</html>
