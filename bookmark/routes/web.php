<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

use App\Http\Controllers\BookController;

Route::get('/', [PageController::class, 'welcome']);
Route::get('/contact', [PageController::class, 'contact']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{title}', [BookController::class, 'show']);
Route::get('/books/filter/{category}/{subcategory}', [BookController::class, 'filter']);

Route::get('/tests', [PageController::class, 'tests'])->middleware('share.location');


// for week 5 Question 9
// Route::post('/books', function () {
//     return 'Version A';
// });

// Route::get('/books/{id?}', function () {
//     return 'Version B';
// });

// Route::get('/books', function () {
//     return 'Version C';
// });