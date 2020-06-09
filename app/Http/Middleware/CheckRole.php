<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Request;

class CheckRole
{



    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth) {
        $this->auth = $auth;
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

        //Chỗ ni quyền chi mới được vào 1 vưới 2
        if(!in_array($this->auth->user()->role, [1,2,3])){
            //403 không có quyền truy cập
            return abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
