<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookEntryController;
use App\Http\Controllers\BookEntryControllerAdmin;

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

Route::get('/Eintraege/erstellen', [BookEntryController::class, 'create'])->middleware('auth');

Route::post('/Eintraege', [BookEntryController::class, 'store'])->middleware('auth');

Route::get('/Eintraege/{bookentry}/bearbeiten', [BookEntryController::class, 'edit'])->middleware('auth');

Route::put('/Eintraege/{bookentry}', [BookEntryController::class, 'update'])->middleware('auth');

Route::delete('/Eintraege/{bookentry}', [BookEntryController::class, 'destroy'])->middleware('auth');

Route::get('/Eintraege/verwalten', [BookEntryController::class, 'manage'])->middleware('auth');

Route::get('/Eintraege/{bookentry}', [BookEntryController::class, 'show']);

//User
Route::get('/registrieren', [UserController::class, 'create'])->middleware('guest');

Route::post('/Nutzer', [UserController::class, 'store']);

Route::post('/abmelden', [UserController::class, 'logout'])->middleware('auth');

Route::get('/anmelden', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/Nutzer/authentifizieren', [UserController::class, 'authenticate']);

//Admin
Route::get('admin/Eintraege/verwalten', [BookEntryControllerAdmin::class, 'manage'])->middleware('auth', 'is_admin');

Route::delete('admin/Eintraege/{bookentry}', [BookEntryControllerAdmin::class, 'destroy'])->middleware('auth', 'is_admin');

Route::put('admin/Eintraege/{bookentry}/release', [BookEntryControllerAdmin::class, 'update'])->middleware('auth');