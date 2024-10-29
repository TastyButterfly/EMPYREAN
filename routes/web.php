<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('homepage');
});
Route::get('/sign_up', function () {
    return view('sign_up');
});
Route::get('/sign_in', function () {
    return view('sign_in');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/AboutUs', function () {
    return view('AboutUs');
});
Route::get('/acknowledgements', function () {
    return view('acknowledgements');
});
Route::get('/assasinCreed_info', function(){
    return view('assasinCreed_info');
});
Route::get('/buyingPass', function(){
    return view('buyingPass');
});