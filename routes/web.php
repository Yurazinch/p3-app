<?php

use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::lending')->name('lending');
Route::livewire('/user', 'pages::user')->name('user');

/*Route::get('/', function () {
    return view('welcome');
});*/


