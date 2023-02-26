<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        # TODO: Query the database for all the books;
        return 'Here are all the books...';
    }

    public function show($title)
    {
        return 'Results for the book: '.$title;
    }

    public function filter($category, $subcategory)
    {
        return 'Results for the filter: '.$category . " " . $subcategory;
    }
}