<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


Route::get('/', function () {
    # Eventually we’ll want to return a view with our customized home page.
    # For now, we’ll just return a simple string


    dump('DESCRIBE p3 database;');

    $tables = DB::select('SHOW TABLES');
    if ($tables) {
        foreach ($tables as $table) {
            dump($table);
        }
    } else {
        dump('No Tables yet');
    }


    return '<h1>My Project !</h1>';
});