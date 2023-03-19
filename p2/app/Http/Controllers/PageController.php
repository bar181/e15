<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    # route: GET('/')
    # show defaul postcards + new postcard from flash session (if available)
    public function welcome()
    {
        # hard code 2 sample postcards
        $postcards= [
            [
                    'title' => 'To Eleanor',
                    'image' => 'https://cdn.midjourney.com/1cef8aa5-d86e-4d42-b3ca-5beb6d4d848e/grid_0.png',
                    'message' => 'love dad',

            ],
            [
                    'title' => 'To Ethan',
                    'image' => 'https://cdn.midjourney.com/7bb41bf7-bdea-4333-a6eb-bb60c806c0d0/grid_0.png',
                    'message' => 'May your high school journey be amazing!',
            ],
        ];

        return view('pages/welcome', [
            'postcards' => $postcards,
            'newPostcard' => session('newPostcard', null)
        ]);
    }


    # route: POST('/')
    # validate form - all fields required (csrf_field hidden)
    # redirects to add a new postcard
    public function create(Request $request)
    {
        $request->validate([
             'title' => 'required|min:3|max:15',
             'message' => 'required|min:3',
             'imageType' => 'required',
             'terms' => 'required',
         ]);

        # If validation fails it will redirect back to `/`
        $formData = $request->all();

        $newPostcard = [
            'title' => $formData['title'],
            'image' => self::getSrc($formData['imageType']),
            'message' => $formData['message'],
        ];

        # Redirect back to the form with data/results stored in the session
        # Ref: https://laravel.com/docs/responses#redirecting-with-flashed-session-data
        return redirect('/')->with([
            'newPostcard' => $newPostcard
        ])->withInput();
    }

    # returns src from available list of images
     public static function getSrc($item): string
     {
         $images = [
             'cute' => 'https://cdn.midjourney.com/412bdf6f-b7db-487b-819b-f550c7bdbbad/grid_0.png',
             'sky' => 'https://cdn.midjourney.com/7441d4fe-dac5-41b8-bfef-a7cdbe28d2d2/grid_0.png',
             'college' => 'https://cdn.midjourney.com/2bb98024-cf3b-4208-bdab-50ee7b69f475/grid_0.png',
             'funny' => 'https://cdn.midjourney.com/6e84f80e-7ee9-4f4c-9f05-a2adc295f50b/grid_0.png',
         ];

         return $images[$item] ?? $images['cute'];
     }
}