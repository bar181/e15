<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Bar;
use App\Models\Image;
use App\Actions\Bar\StoreNewBar;
use App\Actions\Bar\UpdateBar;

// use Illuminate\Support\Facades\Mail;
// use App\Mail\AddNewBookMail;

class BarController extends Controller
{
    public function index(Request $request)
    {
        $limit = 1000;
        $user = $request->user();
        $myBars = ($user) ? Bar::findByUser($user->id, $limit) : [];


        return view('bars/index', [
            'myBars' => $myBars
        ]);
    }

    /**
        * GET /bar/create
        */
    public function create(Request $request)
    {
        $images = Image::orderBy('name')->select(['id', 'name', 'src'])->get();

        return view('bars/create', [
            'images' => $images
        ]);
    }

     /**
    * POST /bar
    * Process the form for adding a new bar
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:bars,slug,alpha_dash',
            'topic' => 'required|max:255',
            'image1' => 'required',
        ]);


        # add user for saving
        $user = $request->user();
        $data = array_merge($request->all(), ['user_id' => $user->id]);

        $action = new StoreNewBar((object) $data);
        $redirectUrl = '/bars/' . $action->results->slug . '/edit';

        return redirect($redirectUrl)->with(['flash-alert' => 'New BAR Created']);
    }

    // public function ogstore(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|max:255',
    //         'slug' => 'required|unique:bars,slug,alpha_dash',
    //         'topic' => 'required|max:255',
    //         'title1' => 'required|max:255',
    //         'content1' => 'required|min:10',
    //         'image1' => 'required',
    //         'title2' => 'required|max:255',
    //         'content2' => 'required|min:10',
    //         'image2' => 'required',
    //     ]);


    //     $user = $request->user();
    //     $data = array_merge($request->all(), ['user_id' => $user->id]);

    //     $action = new StoreNewBar((object) $data);

    //     return redirect('/bars/' . $action->results->slug)->with(['flash-alert' => 'Your new BAR']);
    // }


    /**
     * GET /bar/{slug}
     * Show BAR presentation
     */
    public function show(Request $request, $slug)
    {
        $bar = Bar::findBySlug($slug);

        # Bar does not exist
        if (!$bar) {
            return redirect('/bars')->with(['flash-alert' => 'BAR not found.']);
        }

        # add edit button (if user is author)
        $user = $request->user();
        $isEdit = ($user && $user->id == $bar->user_id);

        # bar not shareable (author can always view)
        # remember $bar->image->src shows the image src
        if (!$isEdit && $bar->share) {
            return redirect('/bars')->with(['flash-alert' => 'BAR not shareable.  Ask author to update']);
        }

        return view('bars/show', [
            'bar' => $bar,
            'isEdit' => $isEdit,
        ]);
    }

     /**
    * GET /bar/{slug}/edit
    * show edit form
    */
    public function edit(Request $request, $slug)
    {
        $bar = Bar::findBySlug($slug);
        $user = $request->user();

        if (!$bar || !$user) {
            return redirect('/bars')->with(['flash-alert' => 'BAR not found.']);
        }

        if ($user->id != $bar->user_id) {
            return redirect('/bars')->with(['flash-alert' => 'Not authorized to edit.']);
        }

        $images = Image::orderBy('name')->select(['id', 'name', 'src'])->get();

        return view('bars/edit', [
            'bar' => $bar,
            'images' => $images

        ]);
    }

    /**
    * PUT /bar/slug
    */
    public function update(Request $request, $slug)
    {
        $bar = Bar::findBySlug($slug);

        $request->validate([
               'name' => 'required|max:255',
               'slug' => 'required|unique:bars,slug,' . $bar->id . '|alpha_dash',
               'topic' => 'required|max:255',
           ]);

        $action = new UpdateBar($bar, (object) $request->all());
        $redirectUrl = '/bars/' . $action->results->slug . '/edit';

        return redirect($redirectUrl)->with(['flash-alert' => 'Your changes were saved']);
    }

    public function search(Request $request)
    {
        # no validate required (want to allow no terms = get everything)
        # Get form data
        $searchType = $request->input('searchType', 'name');
        $searchTerms = $request->input('searchTerms', '');

        # Do the search
        if($searchTerms) {
            $searchResults = Bar::where($searchType, 'LIKE', '%' . $searchTerms . '%')->get();
            $searchDetails = "(search: " . $searchTerms . ")";


        }


        # Redirect back to the form with data/results stored in the session
        # Ref: https://laravel.com/docs/responses#redirecting-with-flashed-session-data
        return redirect('/')->with([
            'searchResults' => $searchResults ?? null,
            'searchDetails' => $searchDetails ?? null
        ])->withInput();
    }

}