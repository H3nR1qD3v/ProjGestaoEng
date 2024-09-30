<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('index');
});

Route::get('/teste', function() {
    return view('teste');
});
