@extends('layouts.main')
@section('title')
    Список задач
@endsection
@section('content')
    @if(Auth::user())
        <h2 class="text-center">Список задач</h2>
        <div class="row justify-content-around">
            <div class="list-group col-6">
                @foreach($tasks as $task)
                    <label class="list-group-item list-inline">
                        <a class="me-1 link-dark text-decoration-none"
                           href="{{route('tasks.show', $task)}}">{{$task->title_task}}</a>
                        @if($task->important_task)
                            <img class="" src="{{ asset('images/important.svg') }}">
                        @endif
                        <form method="POST" action="{{route('tasks.destroy', $task)}}" class="mx-auto float-end">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <img src="{{asset('images/delete.svg')}}">
                            </button>
                        </form>
                        <p class="">Статус задачи:
                            @if($task->completed_task)
                                <img src="{{asset('images/checkbox.svg')}}"> Выполнена
                            @else
                                Не выполнена
                            @endif
                        </p>

                    </label>
                @endforeach
                @else
                    <h3 class="text-primary position-absolute top-50 start-50 translate-middle text-center">Для
                        того, чтобы просматривать список задач, необходимо <a class="alert-link"
                                                                              href="{{route('login')}}">войти</a> в
                        аккаунт.</h3>
                @endif
            </div>
        </div>
        @endsection
