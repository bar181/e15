<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bar;
use App\Models\Image;
use App\Actions\Bar\StoreNewBar;
use App\Actions\Bar\UpdateBar;

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
    * Show new form (provide images)
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
    * redirect to slides edit
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:bars,slug,alpha_dash',
            'topic' => 'required|max:255',
            'image1_id' => 'required',
            'image2_id' => 'required',
            'image3_id' => 'required',
            'content1' => 'required|max:500',
            'content2' => 'required|max:500',
            'content3' => 'required|max:500',
        ]);


        # add user for saving
        $user = $request->user();
        $data = array_merge($request->all(), ['user_id' => $user->id]);

        $action = new StoreNewBar((object) $data);
        $redirectUrl = '/bars/' . $action->results->slug;

        return redirect($redirectUrl)->with(['flash-alert' => 'New BAR Created']);
    }

    /**
     * GET /bar/{slug}
     * Show BAR presentation
     * validate: is shareable (or user = author)
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
        if (!$isEdit && !$bar->share) {
            # note or redirect to login (automatically) if not signed in
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
    * AuthorMiddleware (user = author)
    */
    public function edit(Request $request, $slug)
    {

        $bar = Bar::findBySlug($slug);
        $images = Image::orderBy('name')->select(['id', 'name', 'src'])->get();

        // dd($bar, $bar->image1, $bar->image1->src);

        return view('bars/edit', [
            'bar' => $bar,
            'images' => $images
        ]);
    }

    /**
    * PUT /bar/slug
    * save edit form
    * AuthorMiddleware (user = author)
    * redirect to slides edit
    */
    public function update(Request $request, $slug)
    {
        $bar = Bar::findBySlug($slug);

        # content fields are varchar 500 chars
        $request->validate([
               'name' => 'required|max:255',
               'slug' => 'required|unique:bars,slug,' . $bar->id . '|alpha_dash',
               'topic' => 'required|max:255',
               'image1_id' => 'required',
               'image2_id' => 'required',
               'image3_id' => 'required',
               'content1' => 'required|max:500',
               'content2' => 'required|max:500',
               'content3' => 'required|max:500',
           ]);

        $action = new UpdateBar($bar, (object) $request->all());
        $redirectUrl = '/bars/' . $action->results->slug;

        return redirect($redirectUrl)->with(['flash-alert' => 'Your changes were saved']);
    }


     /**
    *  GET /bar/slug/delete
    * Asks to confirm delete
    */
    public function delete($slug)
    {
        $bar = Bar::findBySlug($slug);

        if (!$bar) {
            return redirect('/bars')->with([
                'flash-alert' => 'Bar not found'
            ]);
        }

        return view('bars/delete', ['bar' => $bar]);
    }

    /**
    * DELETE /bar/{slug}/delete
    * Soft delete
    */
    public function destroy($slug)
    {
        $bar = Bar::findBySlug($slug);
        $bar->delete();

        return redirect('/bars')->with([
            'flash-alert' => '“' . $bar->name . '” was removed.'
        ]);
    }

}