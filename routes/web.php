<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    // VIEW ADD TO DO PAGE
    Route::get('/add-to-do', function (){
        return view('add-to-do');
    })->name('add-to-do');
    
    // PERFORM ADD TASK FUNCTION
    Route::post('/add-to-do', [TaskController::class, 'addTask'])->name('add-to-do-action');

    // VIEW TO DO TASKS
    Route::get('/my-tasks', [TaskController::class, 'viewAllTask'])->name('my-tasks');

    // EDIT ERROR VIEW
    Route::get('/edit-task/{id}', [TaskController::class, 'editTaskView'])->name('edit-task-view');
});

