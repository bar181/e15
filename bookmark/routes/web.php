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

Route::get('/books', [BookController::class, 'index']);

# Make sure the create route comes before the `/books/{slug}` route so it takes precedence
Route::get('/books/create', [BookController::class, 'create']);

# Note the use of the post method in this route
Route::post('/books', [BookController::class, 'store']);

# Show the form to edit a specific book
Route::get('/books/{slug}/edit', [BookController::class, 'edit']);

# Process the form to edit a specific book (show form, post edit, post delete)
Route::put('/books/{slug}', [BookController::class, 'update']);
Route::get('/books/{slug}', [BookController::class, 'show']);

# confirm before delete
Route::get('/books/{slug}/delete', [BookController::class, 'confirm_delete']);
Route::delete('/books/{slug}', [BookController::class, 'delete']);


Route::get('/search', [BookController::class, 'search']);




#practice
Route::any('/practice/{n?}', [PracticeController::class, 'index']);

/**
 * Lists
 */
Route::get('/list', [ListController::class, 'show']);