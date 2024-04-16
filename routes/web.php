<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::controller(\App\Http\Controllers\RegLogController::class)->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('signup', 'index');
        Route::get('signin', 'edit');

        Route::post('signup', 'signup');
        Route::post('signin', 'signin');
    });
    Route::middleware('auth')->group(function () {
        Route::post('logout', 'logout')->name('user.logout');
    });
});

Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {
    Route::get('catalog', 'index');
    Route::get('catalog/{id}', 'show');

    Route::middleware('admin')->group(function () {
        Route::get('admin/product', 'create')->name('product.create');
        Route::post('admin/product', 'store')->name('product.store');
        Route::get('admin/product/{id}', 'edit')->name('product.edit');
        Route::patch('admin/product/{id}', 'update')->name('product.update');
        Route::delete('admin/product/{id}', 'delete')->name('product.delete');
    });
});

Route::middleware('admin')->group(function () {
    Route::controller(\App\Http\Controllers\AdminController::class)->group(function () {
        Route::get('admin', 'index')->name('admin');
    });
});
Route::middleware('admin')->group(function () {
    Route::controller(\App\Http\Controllers\CategoryController::class)->group(function () {
        Route::get('admin/category', 'create')->name('category.create');
        Route::post('admin/category', 'store')->name('category.store');
        Route::get('admin/category/{id}', 'edit')->name('category.edit');
        Route::patch('admin/category/{id}', 'update')->name('category.update');
        Route::delete('admin/category/{id}', 'destroy')->name('category.delete');
    });
});
Route::controller(\App\Http\Controllers\CartController::class)->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('cart', 'index')->name('cart');

        Route::post('cart/add', 'add')->name('cart.add');
        Route::patch('cart/remove', 'remove')->name('cart.remove');
        Route::delete('cart/delete', 'delete')->name('cart.delete');
    });
});
