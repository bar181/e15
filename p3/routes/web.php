<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'welcome']);



Route::group(['middleware' => 'auth'], function () {
    Route::get('/search', [BarController::class, 'search']);
    Route::get('/bars/create/{page?}', [BarController::class, 'create']);
    Route::post('/bars', [BarController::class, 'store']);

    Route::get('/bars/', [BarController::class, 'index']);
    Route::get('/bars/{slug}', [BarController::class, 'show']);
    Route::get('/bars/{slug}/edit', [BarController::class, 'edit']);
    Route::put('/bars/{slug}', [BarController::class, 'update']);


});