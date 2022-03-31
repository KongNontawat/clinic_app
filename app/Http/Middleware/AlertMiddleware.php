<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AlertMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session('msg_success')) {
            $msg_success = session('msg_success');
            if(is_array(session('msg_success')) && count(session('msg_success')) >= 1) {
                $msg_success = str_replace('.','<br>',implode(session('msg_success')));
            }
            toast($msg_success, 'success');
        }

        if (session('msg_error')) {
            $msg_error = session('msg_error');
            if(is_array(session('msg_error')) && count(session('msg_error')) >= 1) {
                $msg_error = str_replace('.','<br>',implode(session('msg_error')));
            }
            toast($msg_error, 'error');
        }

        return $next($request);
    }
}
