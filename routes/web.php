<?php

use App\Http\Controllers\KeywordController;
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
    return view('home');
});

Route::get('/navbar', function () {
    return view('navbar.navbar');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/find', [App\Http\Controllers\KeywordController::class, 'find'])->name('find');
Route::post('/findSearch', [App\Http\Controllers\KeywordController::class, 'findSearch'])->name('findSearch');

Route::resource('/keyword', KeywordController::class);
