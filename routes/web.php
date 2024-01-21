<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UI\ProductController as UIProductController;
use App\Http\Controllers\AdminController;
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

// Route::get('/', function () {
//     return view('admin.layouts.master');
// });

Route::redirect('/','/UI/product');

Route::prefix('admin')->group( function(){
    Route::get('/dashboard', function () {
        return view('admin.layouts.master');
    });

    Route::redirect('/','admin/dashboard');

// Route::get('UI/cart', [UIProductController::class, 'cart'])->name('cart');


// Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('addToCart');

Route::resource('/product', ProductController::class);

Route::resource('/category', CategoryController::class);

Route::resource('/order', OrderController::class);

Route::resource('/admin', AdminController::class);

});

Route::delete('remove-from-cart', [UIProductController::class, 'remove'])->name('remove.from.cart');

Route::patch('update-cart', [UIProductController::class, 'update'])->name('update.cart');

Route::get('UI/cart', [UIProductController::class, 'cart'])->name('cart');

Route::get('UI/product', [UIProductController::class, 'index']);

Route::get('UI/add-to-cart/{id}', [UIProductController::class, 'addToCart'])->name('add.to.cart');

Route::get('UI/checkout', [UIProductController::class, 'checkout'])->name('check')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
