<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Auth::routes();

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/settings', [IndexController::class, 'settings'])->name('settings');
Route::post('/settings', [IndexController::class, 'settingsSave'])->name('settings_save');

Route::get('/friends', [App\Http\Controllers\FriendsController::class, 'index'])->name('friends');

Route::get('/setlocale/{lang}', [App\Http\Controllers\LocaleController::class, 'setLocale'])->name('setlocale');

Route::resource('/groups', App\Http\Controllers\GroupsController::class);
