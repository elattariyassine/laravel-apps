<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class CheckCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Category::all()->count() == 0) {
            session()->flash('error', 'please make sure to add atleast one category to create a post.');
            return redirect()->route('categories.index');
        }
        return $next($request);
    }
}
