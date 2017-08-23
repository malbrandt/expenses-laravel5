<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 22.08.2017
 * Time: 21:54
 */

namespace App\Http\Middleware;

use Closure;


class CheckRole
{

    /**
     * @param $request
     * @param Closure $next
     * @param $role
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            abort(403);
        }

        return $next($request);
    }
}