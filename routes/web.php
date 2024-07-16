<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('home');
});

Route::get('/signup', [UserController::class,'signup'])->name('user.signup');
Route::get('/login', [UserController::class,'login'])->name('user.login');
Route::get('/dashboard', [UserController::class,'dashboard'])->name('users.dashboard');
Route::post('/store', [UserController::class,'store'])->name('user.store');
Route::delete('/delete', [UserController::class,'delete'])->name('user.delete');
