<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Book;

class BookController extends Controller
{
    /**
    * GET /books/create
    * Display the form to add a new book
    */
    public function create(Request $request)
    {
        return view('books/create');
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
            'title' => 'required|max:255',
            'slug' => 'required|unique:books,slug',
            'author' => 'required|max:255',
            'published_year' => 'required|digits:4',
            'cover_url' => 'required|url',
            'info_url' => 'required|url',
            'purchase_url' => 'required|url',
            'description' => 'required|min:20'
        ]);

        # Note: If validation fails, it will automatically redirect the visitor back to the form page
        # and none of the code that follows will execute.
        $book = new Book();
        $book->title = $request->title;
        $book->slug = $request->slug;
        $book->author = $request->author;
        $book->published_year = $request->published_year;
        $book->cover_url = $request->cover_url;
        $book->info_url = $request->info_url;
        $book->purchase_url = $request->purchase_url;
        $book->description = $request->description;
        $book->save();

        return redirect('/books/create')->with(['flash-alert' => 'Your book was added.']);
    }

    /**
    * GET /search
    * Show search results
    */
    public function search(Request $request)
    {
        $request->validate([
            'searchTerms' => 'required',
            'searchType' => 'required'
        ]);


        $bookData = file_get_contents(database_path('books.json'));
        $books = json_decode($bookData, true);

        $searchType = $request->input('searchType', 'title');
        $searchTerms = $request->input('searchTerms', '');

        $books = Book::where($searchType, 'LIKE', '%' . $searchTerms . '%')
         ->get();
        return view('books/index', ['books' => $books]);
    }

    /**
     * GET /books
     * Show all the books
     */
    public function index()
    {
        $books = Book::orderBy('title', 'ASC')->get();
        # can add other collection methods after the query
        $books = $books->sort();


        return view('books/index', ['books' => $books]);
    }

    /**
     * GET /books/{slug}
     * Show an individual book searching by slug
     */
    public function show($slug)
    {
        $book = Book::where('slug', '=', $slug)->first();

        return view('books/show', [
            'book' => $book,
        ]);
    }

     /**
    * GET /books/{slug}/edit
    */
    public function edit(Request $request, $slug)
    {
        $book = Book::where('slug', '=', $slug)->first();

        if (!$book) {
            return redirect('/books')->with(['flash-alert' => 'Book not found.']);
        }

        return view('books/edit', [
            'book' => $book,
        ]);
    }


    /**
    * PUT /books
    */
    public function update(Request $request, $slug)
    {
        $book = Book::where('slug', '=', $slug)->first();

        $request->validate([
           'title' => 'required',
        'slug' => 'required|unique:books,slug,' . $book->id . '|alpha_dash',
        'author' => 'required',
        'published_year' => 'required|digits:4',
        'cover_url' => 'url',
        'info_url' => 'url',
        'purchase_url' => 'required|url',
        'description' => 'required|min:255'
        ]);


        $book->title = $request->title;
        $book->slug = $request->slug;
        $book->author = $request->author;
        $book->published_year = $request->published_year;
        $book->cover_url = $request->cover_url;
        $book->info_url = $request->info_url;
        $book->purchase_url = $request->purchase_url;
        $book->description = $request->description;
        $book->save();


        return redirect('/books/'.$slug.'/edit')->with(['flash-alert' => 'Your changes were saved.']);
    }

    public function confirm_delete(Request $request, $slug)
    {
        $book = Book::where('slug', '=', $slug)->first();

        return view('books/delete', [
            'book' => $book,
        ]);
    }

    /*
    help source:
    https://stackoverflow.com/questions/46098806/laravel-delete-button-with-html-form
    */
    public function delete(Request $request, $slug)
    {
        $book = Book::where('slug', '=', $slug)->first();

        if (!$book) {
            return redirect('/books')->with(['flash-alert' => 'Book not found.']);
        }

        $book->delete();
        return redirect('/books')->with(['flash-alert' => ' Book ' . $book['title'] . ' Deleted.']);
    }
}