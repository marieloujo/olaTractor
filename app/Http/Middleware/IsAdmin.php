<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use App\User;


class IsAdmin
{

    
    protected $user;


    public function __construct()
    {
        $this->user = Auth::user();
    }



    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if ($this->user->role != env('ROLE_ADMIN','admin')) {

            abort(403);

        } else {

            return $next($request);

        }
    }


}
