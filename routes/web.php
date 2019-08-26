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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/group/{group}', 'IndexController@index')->name('group');

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings', 'SettingsController@save')->name('settings_save');
    Route::get('/friends', 'FriendsController@index')->name('friends');
    Route::get('/subscriptions', 'SubscriptionsController@index')->name('subscriptions');

    Route::get('/groups/create/{group}', 'GroupsController@create')->name('groups.create');
    Route::post('/groups', 'GroupsController@store')->name('groups.store');
    Route::get('/groups/{group}/edit', 'GroupsController@edit')->name('groups.edit');
    Route::put('/groups/{group}', 'GroupsController@update')->name('groups.update');
    Route::delete('/groups/{group}', 'GroupsController@destroy')->name('groups.destroy');

});
