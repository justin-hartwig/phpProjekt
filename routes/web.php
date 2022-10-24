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

Route::get('/bookentrys/{bookentry}', [BookEntryController::class, 'show']);

Route::get('/bookentrys/create', [BookEntryController::class, 'create']);