<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blogs', function() {
    return \App\Models\Blog::all();
});

Route::post('/blogs/create', function() {
    return response([
        'title' => 'required',
        'body' => 'required',
    ], 500);
    // return \App\Models\Blog::create(request()->all());
});




