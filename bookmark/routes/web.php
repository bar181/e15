<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\PracticeController;

/**
 * Misc
 */
Route::get('/', [PageController::class, 'welcome']);
Route::get('/contact', [PageController::class, 'contact']);

# Filter route that was used to demonstrate working with multiple route parameters
Route::get('/books/filter/{category}/{subcategory}', [BookController::class, 'filter']);


/**
 * Books
 */

# Make sure the create route comes before the `/books/{slug}` route so it takes precedence
Route::get('/books/create', [BookController::class, 'create']);

Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{slug}', [BookController::class, 'show']);

Route::get('/search', [BookController::class, 'search']);


#practice
Route::any('/practice/{n?}', [PracticeController::class, 'index']);

/**
 * Lists
 */
Route::get('/list', [ListController::class, 'show']);