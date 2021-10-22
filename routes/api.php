<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;

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

Route::get('/category', [CategoryController::class, 'index'])->name('categories');
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('category.delete');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');

Route::get('/product', [ProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::delete('/product/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');

Route::get('/products/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/categories/products-count', [CategoryController::class, 'productsCount'])->name('category.products-count');
Route::get('/categories/{categoryId}/products', [CategoryController::class, 'getProductsByCategoryId'])->name('category.products');



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('profile', [AuthController::class, 'profile']);
    Route::post('logout', [AuthController::class, 'logout']);
});
