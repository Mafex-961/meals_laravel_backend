<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/ok',function(){
//     dd('hi');
// });


Route::get('/category',[CategoryController::class,'all']);
Route::get('/category/{id}',[CategoryController::class,'getCategoryById']);

Route::get('/product',[ProductController::class,'all']);
Route::get('/product/{id}',[ProductController::class,'getProductById']);
