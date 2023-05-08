<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bar;

class PageController extends Controller
{
    public function welcome(Request $request)
    {
        # allBars: If there is data stored in the session as the results of doing a search, otherwise show all public BARs
        # myBars: logged in and has BARs return array (otherwise empty array)

        $user = $request->user();
        $myBars = ($user) ? Bar::findByUser($user->id) : [];

        if (session('searchResults')) {
            $allBars = session('searchResults');
        } else {
            $allBars = Bar::findAllShareable();
        }

        // dd('welcome');
        return view('pages/home', [
            'searchDetails' => session('searchDetails', null),
            'myBars' => $myBars,
            'allBars' => $allBars,
        ]);
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