@extends('layouts.main')
@section('title')
    Вход
@endsection
@section('content')
    <form method="POST" action="{{route('login')}}"
          class="container border border-1 container p-5 position-absolute mx-auto w-25 top-50 start-50 translate-middle">
        <h2 class="text-center">Вход</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <h5>Что-то пошло не так.</h5>
                <ol class="list-group-numbered">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Эл.почта</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Запомните меня</label>
        </div>
        <div class="alert alert-light text-end">
            <button type="submit" class="btn btn-primary">Войти</button>
            <br>
            <a href="{{route('password.request')}}" class="alert-link">Забыли пароль?</a>
        </div>
    </form>
@endsection
