<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Bar;

class AuthorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        # Used to ensure only author is able to see their own works (no visitors or other users)

        # see readme for source GPT prompt (remember to add to kernel)
        $slug = $request->route('slug');
        $bar = Bar::findBySlug($slug);
        $user = $request->user();

        # need to add validation (not provided in source)
        if(!$slug || !$bar || !$user) {

            return redirect('/')->with([
                        'flash-alert' => 'Page not found.'
                    ]);

        }

        if ($user->id != $bar->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}