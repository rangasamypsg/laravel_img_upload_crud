<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TaskController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);

Route::resource('post', 'App\Http\Controllers\PostController');

// Route::get('task/create', [TaskController::class, 'create']);
// Route::post('task/store', [TaskController::class, 'store']);

Route::get('task', [TaskController::class, 'index'])->name('task.index');
Route::post('task', [TaskController::class, 'store'])->name('task.store');

