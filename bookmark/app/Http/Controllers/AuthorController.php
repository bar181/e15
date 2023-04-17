<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Models\Author;

class AuthorController extends Controller
{
    /**
    * GET /books/create
    * Display the form to add a new book
    */
    public function create(Request $request)
    {

        # Get data for authors in alphabetical order by last name
        $authors = Author::orderBy('last_name')->get();

        return view('authors/create', [
            'authors' => $authors
        ]);

    }

    /**
    * POST /books
    * Process the form for adding a new book
    */
    public function store(Request $request)
    {
        # Validate the request data
        # The `$request->validate` method takes an array of data
        # where the keys are form inputs
        # and the values are validation rules to apply to those inputs
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'birth_year' => 'required|digits:4',
            'bio_url' => 'required|url',

        ]);

        # Note: If validation fails, it will automatically redirect the visitor back to the form page
        # and none of the code that follows will execute.
        $author = new Author();
        $author->first_name = $request->first_name;
        $author->last_name = $request->last_name;
        $author->birth_year = $request->birth_year;
        $author->bio_url = $request->bio_url;

        $author->save();

        return redirect('/author/create')->with(['flash-alert' => 'Author Added.']);
    }

}