<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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
//index
Route::get('/', function () {
	return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('user/view', function () {
	return view('backend.users.view_user');
})->name('view.user');

//logout
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//user setup
Route::prefix('user/')->group(function(){
	Route::get('view', [UserController::class, 'viewUser'])->name('view.user');
	Route::get('add', [UserController::class, 'addUser'])->name('add.user');
	Route::post('store', [UserController::class, 'saveUser'])->name('store.user');
	Route::get('edit/{id}', [UserController::class, 'editUser'])->name('edit.user');
	Route::post('update/{id}', [UserController::class, 'updateUser'])->name('update.user');
	Route::get('delete/{id}', [UserController::class, 'deleteUser'])->name('delete.user');
});

//product setup
Route::prefix('product/')->group(function(){
	Route::get('view', [ProductController::class, 'viewProduct'])->name('view.product');
	Route::get('add', [ProductController::class, 'addProduct'])->name('add.product');
	Route::post('store', [ProductController::class, 'saveProduct'])->name('store.product');
	Route::get('edit/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
	Route::post('update/{id}', [ProductController::class, 'updateProduct'])->name('update.product');
	Route::get('delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');
});

