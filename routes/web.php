<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Route::middleware('isLoggedIn')->group(function (){
    //Home page
    Route::get('index', [UserController::class,'index']) -> name('index');
    //logout
    Route::get('users/logout', [UserController::class,'logout']) -> name('users.logout');
});

//Registrations
Route::get('register', [UserController::class,'register'])-> name('users.register');
Route::post('store', [UserController::class,'store'])-> name('users.store');

//Login
Route::get('login', [UserController::class,'login']) -> name('users.login');
Route::post('loginHandle', [UserController::class,'loginHandle'])-> name('users.loginHandle');


