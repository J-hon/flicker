<?php

use Illuminate\Support\Facades\Auth;
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

// Homepage
Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes([ 'verify' => true ]);

// User routes
Route::get('/dashboard', 'HomeController@userIndex')->name('home')->middleware('verified');
Route::post('/{id}/updatePassword', 'Auth\ProfileController@updatePassword')->name('update-password');
Route::get('/{id}/edit-profile', 'Auth\ProfileController@edit')->name('edit-profile');
Route::post('/edit-profile/{id}', 'Auth\ProfileController@update')->name('update-profile');
Route::delete('/{id}/delete-profile', 'Auth\ProfileController@destroy')->name('delete-profile');

// Rave routes
Route::post('/pay', 'RaveController@initialize')->name('pay');
Route::get('/rave/callback', 'RaveController@callback')->name('callback');

// Order routes
Route::get('/orders', 'OrderController@index')->name('orders');

// Admin routes
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function() {

    /**
     * Admin Auth Route(s)
     */
    Route::namespace('Auth')->group(function() {

        // Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        // Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        // Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

        // Email Verification Route(s)
        Route::get('email/verify','VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}','VerificationController@verify')->name('verification.verify');
        Route::get('email/resend','VerificationController@resend')->name('verification.resend');

    });

    // Admin dashboard
    Route::get('/dashboard','HomeController@index')->name('home')->middleware('guard.verified:admin,admin.verification.notice');

    // Movie routes
    Route::resource('movies', 'MovieController');

});
