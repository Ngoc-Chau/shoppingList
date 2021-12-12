<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\ExcelController;
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

    Route::middleware('auth')->group(function(){
        Route::get('/edit', 'InfomationController@edit')->name('auth.edit');
        Route::post('/update', 'InfomationController@update')->name('auth.update');
        Route::post('/changePass', 'InfomationController@changePass')->name('auth.changePass');

        Route::post('/send_mail_password', 'ResetPasswordController@sendMail')->name('auth.sendMail');
        Route::get('/resetPass/{token}', 'ResetPasswordController@showFormPass')->name('auth.showFormPass');
        Route::post('/resetPass', 'ResetPasswordController@resetPassword')->name('auth.resetPassword');
    });
});
 
Route::middleware('auth')->group(function(){
    Route::get('/', 'ShoppingListController@index')->name('shopping.index');
    Route::post('/share_mail', 'ShoppingListController@shareMail')->name('shopping.shareMail');
    Route::get('/create', 'ShoppingListController@create');
    Route::post('/create', 'ShoppingListController@postCreate')->name('shopping.create');
    Route::get('/edit/{id}', 'ShoppingListController@edit');
    Route::post('/update/{id}', 'ShoppingListController@postEdit');
    Route::get('/searchProduct', 'ShoppingListController@searchProduct')->name('shopping.searchProduct');
    Route::get('/destroy/{id}', 'ShoppingListController@destroyProduct');
    Route::post('/deleteALl', 'ShoppingListController@deleteAll')->name('shopping.deleteAll');
    Route::post('/product_completed', 'ShoppingListController@productCompleted')->name('shopping.completed');
    Route::get('/category_uncomplete/{id}', 'ShoppingListController@categoryUncomplete');
    //route category
    Route::get('/category', 'CategoryController@category_index')->name('category_index');
    Route::post('/category_create', 'CategoryController@category_create')->name('category_insert');
    Route::get('/category/delete/{idd}', 'CategoryController@destroy');
    Route::post('/category/update', 'CategoryController@category_update')->name('category_update');
    Route::get('/category/{id}', 'ShoppingListController@index_category');
    //route excel
    Route::get('/export', 'ExcelController@export');
});

//Thay đổi ngôn ngữ
Route::get('lang/{locale}', function($locale)
{
    if(! in_array($locale, ['en', 'vi', 'ja'])) {
        abort(404);
    }
    session()->put('locale',  $locale);
    return redirect()->back();
});





