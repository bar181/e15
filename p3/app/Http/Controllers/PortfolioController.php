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
    /**
     * GET /portfolios/
     * Show all users (with count of shareable BARS)
     */

    public function index(Request $request)
    {
        # query help source in readme
        # get all users with a share, order by total shares (will hide users with only private BARs)
        $portfolios = Bar::select('user_id', DB::raw('count(*) as share_count'))
                    ->where('share', true)
                    ->groupBy('user_id')
                    ->orderBy('share_count', 'desc')
                    ->get();

        # how to display user name via: $bars[0]->user->name
        return view('portfolios/index', [
            'portfolios' => $portfolios
        ]);
    }


    /**
     * GET /portfolios/{user_id}
     * returns portfolio (all public BARS) for a specific user
     * Returns name of the portfolio author
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

        return view('portfolios/show', [
            'bars' => $bars,
            'name' => $user->name,
        ]);
    }

}