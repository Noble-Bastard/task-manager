<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TasksController;
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

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

Route::post('/registerPost', [UserController::class, 'register'])->name('registerPost');
Route::post('/loginPost', [UserController::class, 'login'])->name('loginPost');

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TasksController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{taskId}', [TasksController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/{taskId}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{taskId}', [TasksController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{taskId}', [TasksController::class, 'destroy'])->name('tasks.destroy');
});

