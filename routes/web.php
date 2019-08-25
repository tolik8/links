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
Route::get('/setlocale/{lang}', 'LocaleController@setLocale')->name('setlocale');

Route::get('/group/{group}', 'IndexController@index')->name('group')->middleware('auth');

Route::get('/settings', 'SettingsController@index')->name('settings')->middleware('auth');
Route::post('/settings', 'SettingsController@save')->name('settings_save')->middleware('auth');
Route::get('/friends', 'FriendsController@index')->name('friends')->middleware('auth');
Route::get('/subscriptions', 'SubscriptionsController@index')->name('subscriptions')->middleware('auth');

Route::resource('/groups', 'GroupsController')->middleware('auth');
Route::get('/groups/create/{group}', 'GroupsController@create')->name('groups.new')->middleware('auth');
