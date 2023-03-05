<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('books/index');
    }

    public function show($title)
    {
        $bookFound = true;

        return view('books/show', [
            'title' => $title,
            'bookFound' => $bookFound
        ]);
    }

    public function filter($category, $subcategory)
    {
        return view('books/filter', [
            'category' => $category,
            'subcategory' => $subcategory
        ]);
    }
}