<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookEntryController;

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

//BookEntryController
Route::get('/', [BookEntryController::class, 'index']);

Route::get('/bookentrys/create', [BookEntryController::class, 'create'])->middleware('auth');

Route::post('/bookentrys', [BookEntryController::class, 'store'])->middleware('auth');

Route::get('/bookentrys/{bookentry}/edit', [BookEntryController::class, 'edit'])->middleware('auth');

Route::put('/bookentrys/{bookentry}', [BookEntryController::class, 'update'])->middleware('auth');

Route::delete('/bookentrys/{bookentry}', [BookEntryController::class, 'destroy'])->middleware('auth');

Route::get('/bookentrys/verwalten', [BookEntryController::class, 'manage'])->middleware('auth');

Route::get('/bookentrys/{bookentry}', [BookEntryController::class, 'show']);

//User
Route::get('/registrieren', [UserController::class, 'create'])->middleware('guest');

Route::post('/Nutzer', [UserController::class, 'store']);

Route::post('/abmelden', [UserController::class, 'logout'])->middleware('auth');

Route::get('/anmelden', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/Nutzer/authentifizieren', [UserController::class, 'authenticate']);