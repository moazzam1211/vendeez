<?php

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
Auth::routes();

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/pro-search', [\App\Http\Controllers\ProductsController::class, 'search']);
Route::get('/productDetail/{id}', [\App\Http\Controllers\ProductsController::class, 'productDetail']);

Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'user_type'], function () {
        Route::get('/dashboard', [\App\Http\Controllers\ProductsController::class, 'userHome']);
        Route::get('/cart/{id}', [\App\Http\Controllers\ProductsController::class, 'cart']);
        Route::get('/search', [\App\Http\Controllers\ProductsController::class, 'search']);
    });

});
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => 'admin_type'], function () {
        Route::get('/admin', [\App\Http\Controllers\ProductsController::class, 'admin']);
        Route::get('/admin-panel', [\App\Http\Controllers\ProductsController::class, 'adminPanel']);
        Route::get('/users', [\App\Http\Controllers\usersController::class, 'show']);
        Route::get('user-edit/{id}', [\App\Http\Controllers\usersController::class, 'edit']);
        Route::post('user-update/{id}', [\App\Http\Controllers\usersController::class, 'update']);
        Route::get('/role', [\App\Http\Controllers\usersController::class, 'roles']);
        Route::get('/category', [\App\Http\Controllers\ProductsController::class, 'categories']);
        Route::get('/product-search', [\App\Http\Controllers\ProductsController::class, 'AdminProductSearch']);
        Route::get('/user-search', [\App\Http\Controllers\usersController::class, 'UserSearch']);
        Route::post('delete/{id}', [\App\Http\Controllers\ProductsController::class, 'delete']);
        Route::get('edit/{id}', [\App\Http\Controllers\ProductsController::class, 'edit']);
        Route::post('update/{id}', [\App\Http\Controllers\ProductsController::class, 'update']);
        Route::get('/add', [\App\Http\Controllers\ProductsController::class, 'addProduct']);
        Route::post('/add', [\App\Http\Controllers\ProductsController::class, 'store']);
        Route::get('/products', [\App\Http\Controllers\ProductsController::class, 'products']);
        Route::post('validate', [\App\Http\Controllers\ProductsController::class, 'testData']);
    });


});
Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout']);
