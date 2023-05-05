<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bar;

class PageController extends Controller
{
    public function welcome(Request $request)
    {
        # If there is data stored in the session as the results of doing a search
        # if user logged in and has BARs return array (otherwise empty array)

        $user = $request->user();
        $myBars = ($user) ? Bar::findByUser($user->id) : [];

        if (session('searchResults')) {
            $allBars = session('searchResults');
        } else {
            $allBars = Bar::findAllShareable();
        }


        return view('pages/home', [
            'searchDetails' => session('searchDetails', null),
            'myBars' => $myBars,
            'allBars' => $allBars,
        ]);
    }

}