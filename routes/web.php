<?php

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


Route::domain(env('APP_DOMAIN', 'app.kingdomcaresitters.com'))->group(function() {
    Route::get('/', function () {
        return redirect()->route('dashboard');
    })->name('index');

    Auth::routes();
    Route::get('/register/{role}', 'Auth\RegisterController@showRoleRegistrationForm')->name('register.role');
    Route::match(['put', 'patch'], '/user/{user}/select-role', 'UserController@selectRole')->name('user.select-role');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/users', function(Request $request) {
        return 'hi';
    })->middleware('can:viewAny,App\User')->name('users');
});

