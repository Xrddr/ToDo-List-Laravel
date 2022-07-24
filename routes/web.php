<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::post('tasks/store', [TaskController::class, 'store'])->name('tasks.store');

Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');

Route::delete('/tasks{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

Route::get('tasks/edit/{task}', [TaskController::class, 'edit'])->name('tasks.edit');

Route::put('tasks/edit/update/{task}', [TaskController::class, 'update'])->name('tasks.update');
