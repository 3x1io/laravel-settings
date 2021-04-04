<?php

use Illuminate\Support\Facades\Route;

Route::prefix('settings')->name('settings/')->group(static function () {
    Route::get('/', 'IO3x1\LaravelSettings\Http\Controllers\SettingsController@index')->name('index');
    Route::post('/save', 'IO3x1\LaravelSettings\Http\Controllers\SettingsController@save')->name('save');
    Route::get('/get', 'IO3x1\LaravelSettings\Http\Controllers\SettingsController@get')->name('get');
    Route::get('/create', 'IO3x1\LaravelSettings\Http\Controllers\SettingsController@create')->name('create');
    Route::post('/', 'IO3x1\LaravelSettings\Http\Controllers\SettingsController@store')->name('store');
    Route::get('/{setting}/edit', 'IO3x1\LaravelSettings\Http\Controllers\SettingsController@edit')->name('edit');
    Route::post('/{setting}', 'IO3x1\LaravelSettings\Http\Controllers\SettingsController@update')->name('update');
    Route::delete('/{setting}', 'IO3x1\LaravelSettings\Http\Controllers\SettingsController@destroy')->name('destroy');
});
