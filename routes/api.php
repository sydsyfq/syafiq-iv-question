<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//login api route
Route::post('login', [UserController::class, 'login']);

//user and product route using middleware (auth)
Route::group(['middleware' => ['auth:api']], function(){
	Route::get('user-list', [UserController::class, 'userList']);
	Route::post('logout', [UserController::class, 'logout']);

	Route::get('product-list', [ProductController::class, 'productList']);
	Route::get('product-details/{id}', [ProductController::class, 'productDetails']);
});