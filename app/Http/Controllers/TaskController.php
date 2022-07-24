<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTasksRequest;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        if (Auth::user()) {
            $tasks = Tasks::orderByDesc('important_task')->where('user_id', Auth::id())->get();
            return view('tasks.index', compact('tasks'));
        }
        return view('tasks.index');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(CreateTaskRequest $request)
    {
        Auth::user()->tasks()->create($request->validated());
        return redirect()->route('tasks.index');

    }

    public function show(Tasks $task)
    {
        return view('tasks.show', compact('task'));
    }

    public function edit(Tasks $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTasksRequest $request, Tasks $task)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.index');
    }

    public function destroy(Tasks $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
