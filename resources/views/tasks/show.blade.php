@extends('layouts.main')
@section('title')
    Просмотр задачи
@endsection
@section('content')
    @if(Auth::user()->id == $task->user_id)
        <div class="card text-center ">
            <div class="card-header">
                <a class="btn btn-light" href="{{route('tasks.index')}}">
                    <img src="{{asset('images/left.svg')}}"> Вернуться назад
                </a>
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$task->title_task}}</h5>
                <p class="card-text">{{$task->description_task}}</p>
                <p class="text-end">Статус выполнения:
                    @if($task->completed_task)
                        <img src="{{asset('images/checkbox.svg')}}"> Задача выполнена
                    @else
                        Задача не выполнена
                    @endif
                </p>
                <a href="{{route('tasks.edit', $task)}}" class="btn btn-primary float-end"><img
                        src="{{asset('images/edit.svg')}}">
                    Отредактировать</a>
                <br>
                <br>
                <form method="POST" action="{{route('tasks.destroy', $task)}}" class="float-end">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <img src="{{asset('images/delete.svg')}}"> Удалить
                    </button>
                </form>
            </div>
            <div class="card-footer text-muted text-end">
                Дата создания: {{$task->created_at->format('H:i:s / d-m-Y')}}
                <br>
                Последнее редактирование: {{$task->updated_at->format('H:i:s / d-m-Y')}}
            </div>
        </div>
    @else
        <h3 class="text-danger position-absolute top-50 start-50 translate-middle">Просматривать чужие задачи нехорошо
            :)</h3>
    @endif
@endsection
