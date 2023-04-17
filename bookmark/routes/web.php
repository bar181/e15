<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PracticeController;

/**
 * Misc
 */
Route::get('/', [PageController::class, 'welcome']);
Route::get('/contact', [PageController::class, 'contact']);

# Filter route that was used to demonstrate working with multiple route parameters
// Route::get('/books/filter/{category}/{subcategory}', [BookController::class, 'filter']);


/**
 * Books
 */

Route::group(['middleware' => 'auth'], function () {
    Route::get('/books/create', [BookController::class, 'create']);
    Route::post('/books', [BookController::class, 'store']);
    Route::get('/books', [BookController::class, 'index']);
    Route::get('/search', [BookController::class, 'search']);
    Route::get('/books/{slug}', [BookController::class, 'show']);
    Route::get('/books/{slug}/edit', [BookController::class, 'edit']);
    Route::put('/books/{slug}', [BookController::class, 'update']);
    // Route::get('/books/{slug}/delete', [BookController::class, 'delete']);
    Route::get('/books/{slug}/delete', [BookController::class, 'confirm_delete']);

    Route::delete('/books/{slug}', [BookController::class, 'destroy']);
    Route::get('/search', [BookController::class, 'search']);


    Route::get('/author/create', [AuthorController::class, 'create']);
    Route::post('/author', [AuthorController::class, 'store']);


});

#practice
Route::any('/practice/{n?}', [PracticeController::class, 'index']);


/**
 * Lists
 */
Route::get('/list', [ListController::class, 'show']);