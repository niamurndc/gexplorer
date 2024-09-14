<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('login');
});

// login and logout routes
Route::get('/login', [App\Http\Controllers\Auth\AuthController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Auth\AuthController::class, 'logout'])->name('logout');

// github oauth routes
Route::get('/auth/github', [App\Http\Controllers\Auth\GitAuthController::class, 'login'])->name('github.login');
Route::get('/auth/github/callback', [App\Http\Controllers\Auth\GitAuthController::class, 'callback'])->name('github.callback');

// user routes
Route::get('/dashboard', [App\Http\Controllers\GithubController::class, 'dashboard'])->name('dashboard');
Route::get('/error/{status}', [App\Http\Controllers\GithubController::class, 'error'])->name('error');

// profile routes
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('update.profile');

