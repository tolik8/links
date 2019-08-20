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

Auth::routes();

Route::get('/', 'IndexController@index')->name('index');
Route::get('/settings', 'IndexController@settings')->name('settings');
Route::post('/settings', 'IndexController@settingsSave')->name('settings_save');

Route::get('/friends', 'FriendsController@index')->name('friends');
Route::get('/subscriptions', 'SubscriptionsController@index')->name('subscriptions');

Route::get('/setlocale/{lang}', 'LocaleController@setLocale')->name('setlocale');

Route::resource('/groups', 'GroupsController');
