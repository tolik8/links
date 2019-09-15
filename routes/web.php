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
    Route::get('/group', 'IndexController@redirectToIndex');

    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings', 'SettingsController@save')->name('settings_save');
    Route::get('/friends', 'FriendsController@index')->name('friends');
    Route::get('/subscriptions', 'SubscriptionsController@index')->name('subscriptions');

    Route::resource('/groups', 'GroupsController')->except(['index', 'show', 'create']);
    Route::get('/groups/create/{group?}', 'GroupsController@create')->name('groups.create');

    Route::resource('/links', 'LinksController')->except(['index', 'show', 'create']);
    Route::get('/links/create/{group?}', 'LinksController@create')->name('links.create');

    Route::get('/cookie/show_edit_elements/{value}', 'SetCookieController@show_edit_elements');
});
