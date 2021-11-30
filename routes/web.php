<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\BlogController;
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
});

Route::get('/', 'ShoppingListController@index')->name('shopping.index');
Route::get('/create', 'ShoppingListController@create')->name('shopping.create');
Route::post('/create', 'ShoppingListController@postCreate')->name('shopping.create');
Route::get('/edit-{id}', 'ShoppingListController@edit')->name('shopping.edit');
Route::post('/edit-{id}', 'ShoppingListController@postEdit')->name('shopping.edit');
Route::get('/destroy', 'ShoppingListController@destroy')->name('shopping.destroy');
Route::get('/deleteALl', 'ShoppingListController@deleteAll')->name('shopping.deleteAll');
