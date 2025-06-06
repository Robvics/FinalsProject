<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        if(Auth::check()){

            $user = Auth::user();
            if(in_array($user->user_role,$role)){
                return $next($request);
            }

            
            if($user->user_role === 'customer'){
                return redirect()->route('home');
            }elseif($user->user_role === 'admin'){
                return redirect()->route('dashboard');
            }else{
                Auth::logout();
                session()->invalidate();
                session()->regenerateToken();
            }
    
        }
        return $next($request);
    }
}
