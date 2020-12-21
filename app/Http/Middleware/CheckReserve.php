<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckReserve
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
        if (Auth::user()->student->reserves->status == 1) {
            return $next($request);
        }
        abort(403, 'Bạn đang trong thời gian bảo lưu nên không thể truy cập chức năng này!');
    }
}
