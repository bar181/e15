<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\BarController;
use App\Http\Controllers\PortfolioController;


use App\Http\Controllers\TestController;

Route::get('/', [PageController::class, 'welcome']);

# auth users only
Route::group(['middleware' => 'auth'], function () {

    # list of all works for the user
    Route::get('/bars/', [BarController::class, 'index']);

    #  create new form
    Route::get('/bars/create/', [BarController::class, 'create']);

    #  save create BAR
    Route::post('/bars', [BarController::class, 'store']);

    #  list of users with a shareable work
    Route::get('/portfolios/', [PortfolioController::class, 'index']);

    #  show list of works for another user
    Route::get('/portfolios/{user_id}', [PortfolioController::class, 'show']);


    # user is author - see readme for middleware source
    Route::group(['middleware' => ['auth', 'auth.author']], function () {
        #  edit form
        Route::get('/bars/{slug}/edit', [BarController::class, 'edit']);

        #  confirm process edit
        Route::put('/bars/{slug}', [BarController::class, 'update']);

        #  user to confirm deletion
        Route::get('/bars/{slug}/delete', [BarController::class, 'delete']);

        # soft delete
        Route::delete('/bars/{slug}', [BarController::class, 'destroy']);

    });

});

# available to all: retain order - catch all last

# show a specific work
Route::get('/bars/{slug}', [BarController::class, 'show']);

# search for existing BARS (home page)
Route::get('/search', [PageController::class, 'search']);



# Dev work only
if (!App::environment('production')) {
    Route::get('/test/refresh-database', [TestController::class, 'refreshDatabase']);
    Route::get('/test/login-as/{userId}', [TestController::class, 'loginAs']);
}