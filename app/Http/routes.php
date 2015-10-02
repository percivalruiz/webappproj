<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::model('userdetails', 'UserDetails');
Route::model('userdonattion', 'UserDonation');
Route::model('user', 'User');

Route::resource('user', 'UserController');
Route::resource('user.userdonation', 'UserDonationController');
Route::resource('user.userdetails', 'UserDetailsController');

Route::get('user/register', function() {
  return View::make('register');
});

Route::post('user/register', 'UserController@register');