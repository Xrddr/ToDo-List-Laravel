@extends('layouts.main')
@section('title')
    Создать задачу
@endsection
@section('content')
    @if(Auth::user())
        <form method="post" action="{{route('tasks.store')}}"
              class="text-center container border border-1 container p-5 position-absolute mx-auto w-50 top-50 start-50 translate-middle"
              id="form_create_task">
            <h2>Создание задачи</h2>
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название задачи</label>
                <input type="text" class="form-control" name="title_task" id="exampleFormControlInput1"
                       placeholder="Введите название задачи">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
                <textarea class="form-control" name="description_task" id="exampleFormControlTextarea1" rows="3"
                          placeholder="Введите описание задачи"></textarea>
            </div>
            <div class="form-check form-switch text-start">
                <input class="form-check-input" type="checkbox" name="important_task" value="1"
                       {{old('important_task') == 1 ? 'checked' : ''}} id="important_task">
                <label class="form-check-label" for="important_task">Важная задача</label>
            </div>
            <button type="submit" class="btn btn-primary">Создать задачу</button>
        </form>
    @else
        <h3 class="text-primary position-absolute top-50 start-50 translate-middle text-center">Для того, чтобы
            создавать задачи, необходимо <a class="alert-link" href="{{route('login')}}">войти</a> или <a
                class="alert-link" href="{{route('register')}}">зарегистрироваться</a>.</h3>
    @endif
@endsection
