<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo "<pre>";print_r($request);exit;
        //How to check if condition works if check has above 20
        //in url do this -> http://127.0.0.1:8000/about?check=22 ->if check value is above 20 it will go to about or else redirected to contact page
        if($request->check <=20)
        {
            return redirect('contact');
        }
        return $next($request);
    }
}
