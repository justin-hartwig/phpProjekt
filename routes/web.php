<?php

use App\Http\Controllers\BookEntryController;
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

Route::get('/', [BookEntryController::class, 'index']);

Route::get('/bookentrys/create', [BookEntryController::class, 'create']);

Route::post('/bookentrys', [BookEntryController::class, 'store']);

Route::get('/bookentrys/{bookentry}/edit', [BookEntryController::class, 'edit']);

Route::put('/bookentrys/{bookentry}', [BookEntryController::class, 'update']);

Route::delete('/bookentrys/{bookentry}', [BookEntryController::class, 'destroy']);

Route::get('/bookentrys/{bookentry}', [BookEntryController::class, 'show']);