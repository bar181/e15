<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BarController;

Route::get('/', [PageController::class, 'welcome']);

# auth users only
Route::group(['middleware' => 'auth'], function () {

    Route::get('/bars/', [BarController::class, 'index']);
    Route::get('/bars/create/', [BarController::class, 'create']);
    Route::post('/bars', [BarController::class, 'store']);


    # user is author - see readme for middleware source
    Route::group(['middleware' => ['auth', 'auth.author']], function () {
        # retain order - catch all last
        Route::get('/bars/{slug}/edit', [BarController::class, 'edit']);
        Route::put('/bars/{slug}', [BarController::class, 'update']);
    });

});

# available to all
Route::get('/bars/{slug}', [BarController::class, 'show']);
Route::get('/search', [PageController::class, 'search']);