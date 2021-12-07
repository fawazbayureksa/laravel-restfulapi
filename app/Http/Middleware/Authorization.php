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
        $costumer = Costumers::where('token', $token)->first();

        if ($costumer == null || $token == '') //jika costumer tidak ada atau token kosong
        //stop proses dan kirimkan response token invalid
        {
            return response()->json([
                'status' => 'invalid',
                'data' => null,
                'error' => ['Token Invalid, unauthorized'], 401 //status unauthorized

            ]);
            //simpan data costumer
        }
        $request->setUserResolver(function () use ($costumer) {
            return $costumer;
        });

        return $next($request);
    }
}
