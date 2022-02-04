<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::get('/addmember', [IndexController::class, 'add'])->name('add');

Route::post('/addmember', [IndexController::class, 'addmember'])->name('addmember');

Route::get('/addatasan', [IndexController::class, 'addatasan'])->name('addatasan')->middleware('auth');

Route::post('/addatasan', [IndexController::class, 'addatasanpost'])->name('addatasanpost')->middleware('auth');

Route::get('/addbawahan', [IndexController::class, 'addbawahan'])->name('addbawahan')->middleware('auth');

Route::post('/addbawahan', [IndexController::class, 'addbawahanpost'])->name('addbawahanpost')->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


