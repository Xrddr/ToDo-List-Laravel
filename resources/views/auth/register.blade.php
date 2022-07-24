@extends('layouts.main')
@section('title')
    Регистрация
@endsection
@section('content')
    <form method="POST" action="{{route('register')}}"
          class="border border-1 p-5 position-absolute w-25 top-50 start-50 translate-middle">
        <h2 class="text-center">Регистрация</h2>
        @if($errors->any())
            <div class="alert alert-danger">
                <h6>Что-то пошло не так.</h6>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label for="exampleInputText1" class="form-label">Имя</label>
            <input type="text" class="form-control" name="name" id="exampleInputText1" aria-describedby="textHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Эл.почта</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Повторите пароль</label>
            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="alert alert-light text-end">
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            <br>
            <a href="{{route('login')}}" class="alert-link">Уже зарегистрированы?</a>
        </div>
    </form>
@endsection
