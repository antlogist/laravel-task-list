<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function (Task $tasks) {
    return view('index', [
        'tasks' => $tasks->latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::get('/tasks/create', function () {
    return view('create');
})->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

Route::post('tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    $task->status()->create();

    return redirect()->route('tasks.show', $task)->with('success', 'Task created');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('tasks.show', $task)->with('success', 'Task updated');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted');
})->name('tasks.delete');

Route::put('/tasks/{task}/complete', function (Task $task) {
    $task->save();

    $task->status->status = !$task->status->status;
    $task->status()->update(['status' => $task->status->status]);

    return redirect()->back()->with('success', $task->completed ? 'Task completed' : 'Task not completed');
})->name('tasks.complete');

Route::fallback(function () {
    return redirect()->route('tasks.index');
})->name('fallback');
