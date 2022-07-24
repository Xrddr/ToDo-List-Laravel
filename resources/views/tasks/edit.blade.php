@extends('layouts.main')
@section('title')
    Редактирование задачи
@endsection
@section('content')
    <form method="post" action="{{route('tasks.update', $task)}}"
          class="text-center container border border-1 container p-5 position-absolute mx-auto w-50 top-50 start-50 translate-middle">
        <h2>Редактирование задачи</h2>
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
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Название задачи</label>
            <input type="text" class="form-control" value="{{$task->title_task}}" name="title_task"
                   id="exampleFormControlInput1"
                   placeholder="Введите название задачи">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Описание</label>
            <textarea class="form-control" name="description_task" id="exampleFormControlTextarea1" rows="3"
                      placeholder="Введите описание задачи">{{$task->description_task}}</textarea>
        </div>
        <div class="form-check form-switch text-start">
            <input hidden name="completed_task" value="0">
            <input class="form-check-input" type="checkbox" name="completed_task" value="1"
                   {{($task->completed_task) ? 'checked' : ''}} id="completed_task'"
                   @if($task->completed_task == true)
                       checked
                @endif
            >
            <label class="form-check-label" for="completed_task'">Выполнена задача?</label>
        </div>
        <div class="form-check form-switch text-start">
            <input hidden name="important_task" value="0">
            <input class="form-check-input" type="checkbox" name="important_task" value="1"
                   {{($task->important_task) ? 'checked' : ''}} id="important_task"
                   @if($task->important_task == true)
                       checked
                @endif>
            <label class="form-check-label" for="important_task">Важная задача</label>
        </div>
        <button type="submit" class="btn btn-primary">Отредактировать задачу</button>
    </form>
@endsection
