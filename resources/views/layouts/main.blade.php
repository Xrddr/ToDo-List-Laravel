<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/logo.svg')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
<nav class="py-1 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto ">
            <li class="nav-item"><a href="{{route('tasks.create')}}" class="nav-link link-dark px-2"><img
                        src="{{ asset('images/add.svg') }}"> Создать задачу</a></li>
            <li class="nav-item"><a href="{{route('tasks.index')}}" class="nav-link link-dark px-2"><img
                        src="{{ asset('images/list.svg') }}"> Просмотреть список задач</a></li>
        </ul>
        @if(Auth::user())
            <div class="nav-item dropdown border-start">
                <a class="nav-link link-dark dropdown-toggle" href="#" id="dropdown09" data-bs-toggle="dropdown"
                   aria-expanded="false"><img src="{{ asset('images/user.svg') }}"> {{ Auth::user()->name }}</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown09">
                    <li><a class="dropdown-item" href="{{route('dashboard')}}"><img
                                src="{{ asset('images/admin.svg') }}"> Dashboard</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <form method="POST" action="{{route('logout')}}">
                        @csrf
                        <li>
                            <button class="dropdown-item" href="{{route('logout')}}"><img
                                    src="{{ asset('images/logout.svg') }}"> Выйти
                            </button>
                        </li>
                    </form>
                </ul>
            </div>
        @else
            <ul class="nav border-start">
                <li class="nav-item"><a href="{{route('login')}}" class="nav-link link-dark px-2">Вход</a></li>
                <li class="nav-item"><a href="{{route('register')}}" class="nav-link link-dark px-2">Регистрация</a>
                </li>
            </ul>
        @endif
    </div>
</nav>
<br>
<div class="container">
    @yield('content')
</div>

</body>
</html>
