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
    return view('welcome');
})->name('welcome');


Route::get('/users/all', [UserController::class, 'index'])->name('all-users');
Route::get('/users/all/{id}', [UserController::class, 'show'])->name('id-users');
Route::get('/users/store', [UserController::class, 'store'])->name('store-users');
Route::get('/users/all/{id}/delete', [UserController::class, 'delete'])->name('delete-users');
