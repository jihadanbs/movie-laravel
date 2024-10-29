<?php

// use App\Http\Middleware\CheckMembership;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/movie', function () use ($movie) {
//     return $movie;
// });

$movie = [];

for ($i = 0; $i < 10; $i++) {
    $movie[] = [
        'title' => 'movie ' . $i,
        'genre' => 'Comedy',
        'year' => '2021'
    ];
}

Route::group([
    'middleware' => ['isAuth'],
    'prefix' => 'movie',
    'as' => 'movie'
], function () use ($movie) {

    Route::get('/', [MovieController::class, 'index']);

    Route::get('/{id}', function ($id) use ($movie) {
        return $movie[$id];
    })->middleware('isMember');

    Route::post('/', function () use ($movie) {
        $movie[] = [
            'title' => request('title'),
            'genre' => request('genre'),
            'year' => request('year')
        ];

        return $movie;
    });

    Route::put('/{id}', function ($id) use ($movie) {
        $movie[$id]['title'] = request('title');
        $movie[$id]['year'] = request('year');
        $movie[$id]['genre'] = request('genre');

        return $movie;
    });

    Route::patch('/{id}', function ($id) use ($movie) {
        $movie[$id]['title'] = request('title');
        $movie[$id]['year'] = request('year');
        $movie[$id]['genre'] = request('genre');

        return $movie;
    });

    Route::delete('/{id}', function ($id) use ($movie) {
        unset($movie[$id]);
        return $movie;
    });
});

//alias
// Route::get('/movie', function () {
//     return 'movie';
// })->middleware(['isAuth', 'isMember']);

Route::get('/pricing', function () {
    return 'please, buy a membership';
    // return view('pricing');
});

Route::get('/login', function () {
    return 'login page';
})->name('login');
