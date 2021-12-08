<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShoppingListController;
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
Route::pattern('id', '([0-9]+)');

Route::namespace('Auth')->group(function(){
    Route::get('/login', 'AuthController@login')->name('auth.login');
    Route::post('/login', 'AuthController@postLogin')->name('auth.login');
    Route::get('/register', 'AuthController@register')->name('auth.register');
    Route::post('/register', 'AuthController@postRegister')->name('auth.register');
    Route::get('/logout', 'AuthController@logout')->name('auth.logout');

    Route::get('/edit', 'AuthController@edit')->name('auth.edit');
    Route::post('/update', 'AuthController@update')->name('auth.update');
    Route::post('/resetPass', 'AuthController@resetPass')->name('auth.resetPass');
});
//route Product
Route::get('/', 'ShoppingListController@index')->name('shopping.index');
Route::get('/create', 'ShoppingListController@create');
Route::post('/create', 'ShoppingListController@postCreate')->name('shopping.create');
Route::get('/edit/{id}', 'ShoppingListController@edit');
Route::post('/update/{id}', 'ShoppingListController@postEdit');
Route::get('/destroy/{id}', 'ShoppingListController@destroyProduct');
Route::get('/deleteALl', 'ShoppingListController@deleteAll')->name('shopping.deleteAll');
//route category
Route::get('/category',[CategoryController::class,'category_index'])->name('category_index');
Route::post('/category_create',[CategoryController::class,'category_create'])->name('category_insert');
Route::get('/category/delete/{idd}',[CategoryController::class,'destroy']);
Route::post('/category/update',[CategoryController::class,'category_update'])->name('category_update');
Route::get('/category/{id}',[ShoppingListController::class,'index_category']);
Route::post('/category_complete',[CategoryController::class,'category_complete'])->name('category_complete');
Route::get('/category_uncomplete/{id}',[CategoryController::class,'category_uncomplete']);



