<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrabotanController;

Route::resource('/prabotan', PrabotanController::class);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/shinta', function () {
    return view('halaman');
});


