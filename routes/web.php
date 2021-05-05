<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;

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
    return view('welcome');
});

Route::get('devtube/media', [MediaController::class, 'index'])->name('devtube.media');
Route::Post('devtube/media/store', [MediaController::class, 'store'])->name('devtube.media.store');
Route::get('devtube/media/delete/{id}', [MediaController::class, 'delete'])->name('devtube.media.delete');
