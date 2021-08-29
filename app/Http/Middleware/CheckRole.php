<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
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
        if($request->user()->role == null)//نتحقق اذا اليوزر مسجل دخول
        {
            return redirect('/posts');
        }
            $action=$request->route()->getAction();//يتحقق من الراوتس
            $roles=isset($action['roles'])?$action['roles']:null;//نطلع الرولز الموجوده بكل راوتس
            if($request->user()->hasAnyRole() or !$roles)// نتحقق من الرولز
        {
            return $next($request);
        }
        else
        {
            return redirect('/posts');
        }
        return $next($request);
    }
}
