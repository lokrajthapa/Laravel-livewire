<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
Route::get('/login', function () {
    return view('livewire.home');
})->name('login');

Route::get('/logout', function() 
{
    Auth::logout();

    return redirect('/');
})->name('logout');

Route::get('/dashboard', function () 
{
    return view('livewire.dashboard.dashboard');
})->middleware('auth');


