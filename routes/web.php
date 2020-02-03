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
    Route::get('/register/next', 'UserController@continueRegistration')->name('register.next');
    Route::get('/register/{role}', 'Auth\RegisterController@showRoleRegistrationForm')->name('register.role');


    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/users', function(Request $request) {
        return 'hi';
    })->middleware('can:viewAll,App\User')->name('users');

    Route::prefix('me')->middleware('auth')->group(function () {
        Route::get('', 'UserController@view')->name('profile.self');
        Route::get('edit', 'UserController@edit')->name('profile.self.edit');
    });

    // Form Handlers
    Route::match(['put', 'patch'], '/user/{user}/select-role', 'UserController@selectRole')->middleware('can:update,user')->name('user.select-role');
    Route::match(['put', 'patch'], '/users/{user}/update', 'UserController@update')->middleware('can:update,user')->name('user.update');

    // Testing Purposes
    Route::get('/test', function() {
        $user = Auth::check() ? Auth::user() : new App\User;
        dd($user->getFillable());
    });
});

