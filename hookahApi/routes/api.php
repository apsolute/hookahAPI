<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'club'], function () {
    Route::get('list', 'HookahClubController@index')->name('club-list');
    Route::post('add', 'HookahClubController@store')->name('club-add');
    Route::get('show/{id}', 'HookahClubController@show')->name('club-show');
});

Route::group(['prefix' => 'hookah'], function () {
    Route::get('list', 'HookahController@index')->name('hookah-list');
    Route::post('add', 'HookahController@store')->name('hookah-add');
    Route::get('show/{id}', 'HookahController@show')->name('hookah-show');
});

Route::group(['prefix' => 'booking'], function () {
    Route::post('book', 'HookahBookingController@book')->name('hookah-book');
    Route::get('find-available', 'HookahBookingController@findHookahs')->name('available-hookah');
    Route::get('customers-list', 'HookahBookingController@customersList')->name('customers-list');
});
