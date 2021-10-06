<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/{id}', [UserController::class, 'show'])->name('user.show');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::delete('/users/{id}', [UserController::class, 'delete'])->name('user.delete');
Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
