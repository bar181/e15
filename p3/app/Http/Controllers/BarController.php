<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Bar;
use App\Models\Image;
use App\Actions\Bar\StoreNewBar;

// use Illuminate\Support\Facades\Mail;
// use App\Mail\AddNewBookMail;

class BarController extends Controller
{
    /**
    * GET /books/create
    * Display the form to add a new book
    */
    public function create(Request $request)
    {

        $images = Image::orderBy('name')->select(['id', 'name', 'src'])->get();

        return view('bars/create', [
            'images' => $images
        ]);
    }

     /**
    * POST /books
    * Process the form for adding a new book
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:bars,slug,alpha_dash',
            'topic' => 'required|max:255',
            'title1' => 'required|max:255',
            'content1' => 'required|min:10',
            'image1' => 'required',
            'title2' => 'required|max:255',
            'content2' => 'required|min:10',
            'image2' => 'required',
        ]);


        $user = $request->user();
        $data = array_merge($request->all(), ['user_id' => $user->id]);

        $action = new StoreNewBar((object) $data);

        // $mail = new AddNewBookMail($action->results->book);
        // Mail::to($user->email)->send($mail);


        return redirect('/bars/' . $action->results->slug)->with(['flash-alert' => 'Your new BAR']);
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

        # If validation fails it will redirect back to `/`

        # Get form data
        $searchType = $request->input('searchType', 'title');
        $searchTerms = $request->input('searchTerms', '');

        # Do the search
        $searchResults = Book::where($searchType, 'LIKE', '%' . $searchTerms . '%')->get();

        # Redirect back to the form with data/results stored in the session
        # Ref: https://laravel.com/docs/responses#redirecting-with-flashed-session-data
        return redirect('/')->with([
            'searchResults' => $searchResults
        ])->withInput();
    }

    /**
     * GET /books
     * Show all the books
     */
    public function index()
    {
        $books = Book::orderBy('title', 'ASC')->get();

        //$newBooks = Book::orderBy('id', 'DESC')->limit(3)->get();

        $newBooks = $books->sortByDesc('id')->take(3);

        return view('books/index', [
            'books' => $books,
            'newBooks' => $newBooks
        ]);
    }

    /**
     * GET /books/{slug}
     * Show an individual book searching by slug
     */
    public function show(Request $request, $slug)
    {
        $bar = Bar::findBySlug($slug);

        if (!$bar) {
            return redirect('/bars')->with(['flash-alert' => 'BAR not found.']);
        }

        return view('bars/show', [
            'bar' => $bar,
        ]);
    }

     /**
    * GET /books/{slug}/edit
    */
    public function edit(Request $request, $slug)
    {
        $book = Book::where('slug', '=', $slug)->first();

        $authors = Author::getForDropdown();

        if (!$book) {
            return redirect('/books')->with(['flash-alert' => 'Book not found.']);
        }

        return view('books/edit', [
            'book' => $book,
            'authors' => $authors
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
            'author_id' => 'required',
            'published_year' => 'required|digits:4',
            'cover_url' => 'url',
            'info_url' => 'url',
            'purchase_url' => 'required|url',
            'description' => 'required|min:100'
        ]);

        $book->title = $request->title;
        $book->slug = $request->slug;
        $book->author_id = $request->author_id;
        $book->published_year = $request->published_year;
        $book->cover_url = $request->cover_url;
        $book->info_url = $request->info_url;
        $book->purchase_url = $request->purchase_url;
        $book->description = $request->description;
        $book->save();

        return redirect('/books/'.$slug.'/edit')->with(['flash-alert' => 'Your changes were saved.']);
    }

     /**
    * Asks user to confirm they want to delete the book
    * GET /books/{slug}/delete
    */
    public function delete($slug)
    {
        $book = Book::findBySlug($slug);

        if (!$book) {
            return redirect('/books')->with([
                'flash-alert' => 'Book not found'
            ]);
        }

        return view('books/delete', ['book' => $book]);
    }

    /**
    * Deletes the book
    * DELETE /books/{slug}/delete
    */
    public function destroy($slug)
    {
        $book = Book::findBySlug($slug);

        $book->delete();

        return redirect('/books')->with([
            'flash-alert' => '“' . $book->title . '” was removed.'
        ]);
    }

    /**
     * GET /books/filter/{category}/{subcategory}
     * Filter method that was demonstrate working with multiple route parameters
     */
    public function filter($category, $subcategory)
    {
        return 'Show all books in these categories: ' . $category . ',' . $subcategory;
    }
}