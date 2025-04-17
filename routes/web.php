<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tickets/search', 'App\Http\Controllers\TicketController@search')->name('tickets.search');
Route::resource('/tickets', 'App\Http\Controllers\TicketController');

