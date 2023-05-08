<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bar;
use App\Models\User;
use DB;

// use Illuminate\Support\Facades\Mail;
// use App\Mail\AddNewBookMail;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        # query help source in readme
        # get all users with a share, order by total shares
        $bars = Bar::select('user_id', DB::raw('count(*) as share_count'))
                    ->where('share', true)
                    ->groupBy('user_id')
                    ->orderBy('share_count', 'desc')
                    ->get();

        # how to display user name via: $bars[0]->user->name
        return view('portfolios/index', [
            'bars' => $bars
        ]);
    }


    /**
     * GET /portfolios/{user_id}
     * Show Portfolio (all BARS) for a specific user
     * validate: is shareable (or user = author)
     */
    public function show(Request $request, $user_id)
    {

        # verify user exists
        $user = User::find($user_id);
        if (!$user) {
            return redirect('/portfolios')->with(['flash-alert' => 'Portfolio not found.']);
        }

        # get list of user bars where the bar is set to share
        $limit = 1000;
        $bars = Bar::orderBy('updated_at', "DESC")
            ->where('user_id', '=', $user_id)
            ->where('share', true)
            ->limit($limit)
            ->get();

        // dd($bars);
        return view('portfolios/show', [
            'bars' => $bars,
            'name' => $user->name,
        ]);
    }

}