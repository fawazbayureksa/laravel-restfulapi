<?php

namespace App\Http\Middleware;
use App\Models\Costumers;
use Closure;
use Illuminate\Http\Request;

class Authorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('token');
        $costumer = Costumers::where('token',$token)->first();

        if($costumer == null || $token == '') //jika costumer tidak ada atau token kosong
        //stop proses dan kirimkan response token invalid
        {

        }



        return $next($request);
    }
}
