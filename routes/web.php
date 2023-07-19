<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
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
    return view('welcome');
}); 

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/userlogin', [AuthController::class, 'postlogin'])->name('userlogin');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/check', [AuthController::class, 'postRegister'])->name('register.store');

Route::group(['middleware'=>'auth'],function(){
    Route::group(['prefix'=>'products', 'as'=> 'product.'],
    function(){
        Route::get('/',[ProductController::class, 'index'])->name('index');
        Route::get('/add',[ProductController::class, 'add'])->name('add');
        Route::post('/store',[ProductController::class, 'store'])->name('store');
        Route::get('/buy/{id}',[ProductController::class, 'update'])->name('buy');
        Route::get('/edit/{id}',[ProductController::class, 'edit'])->name('edit');
        Route::post('/edited/{id}',[ProductController::class, 'edited'])->name('edited');
        Route::get('/delete/{id}',[ProductController::class, 'delete'])->name('delete');
        Route::get('/remove/{id}',[ProductController::class, 'remove'])->name('remove');
        Route::get('/my',[ProductController::class, 'myproducts'])->name('my');
    });

    Route::group(['prefix'=>'profile', 'as'=> 'profile.'],
    function(){
        Route::get('/',[ProfileController::class, 'index'])->name('index');
        
    });
});



Route::get('/logout',[AuthController::class,'logout'])->name('logout');

