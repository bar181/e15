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

        // return $next($request);
        $slug = $request->route('slug');
        $bar = Bar::findBySlug($slug);
        $user = $request->user();

        if ($user->id != $bar->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}