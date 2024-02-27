<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('tasks', [App\Http\Controllers\TaskController::class, 'get_all_tasks']);

Route::post('create_tasks', [App\Http\Controllers\TaskController::class, 'create_tasks']);

Route::delete('tasks/delete/{id}', [App\Http\Controllers\TaskController::class, 'delete_tasks'])->withoutMiddleware(['csrf']);

Route::put('tasks/update/{id}', [App\Http\Controllers\TaskController::class, 'update_tasks']);

