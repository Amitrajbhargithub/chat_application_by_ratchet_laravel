<?php

use App\Http\Controllers\SampleController;
use App\Http\Controllers\Student\LoginController;
use App\Http\Controllers\Student\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});

Route::controller(SampleController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::get('registration', 'registration')->name('registration');

    Route::get('logout', 'logout')->name('logout');

    Route::post('user-registration', 'userRegistration')->name('user-registration');

    Route::post('user-login', 'userlogin')->name('user-login');

    Route::get('dashboard', 'dashboard')->name('dashboard');
    
    Route::get('profile', 'profile')->name('profile');

    Route::post('update-profile', 'updateProfile')->name('update-profile');

});
