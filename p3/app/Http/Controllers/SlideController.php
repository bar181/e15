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

class SlideController extends Controller
{
    /**
    * GET /bar/{slug}/slide/edit
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
               'image_id' => 'required',
           ]);

        $action = new UpdateBar($bar, (object) $request->all());
        $redirectUrl = '/bars/' . $action->results->slug . '/edit';

        return redirect($redirectUrl)->with(['flash-alert' => 'Your changes were saved']);
    }


}
