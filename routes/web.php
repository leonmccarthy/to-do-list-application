<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
});

