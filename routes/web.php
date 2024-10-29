<?php

use App\Http\Middleware\CheckMembership;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/movie', function () use ($movie) {
//     return $movie;
// });

Route::get('/movie', function () {
    return 'movie';
})->middleware(CheckMembership::class);

Route::get('/pricing', function () {
    return 'please, buy a membership';
    // return view('pricing');
});
