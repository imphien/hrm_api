<?php
/**
 * @Author im.phien
 * @Date   Mar 20, 2024
 */

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use YaangVu\LaravelBase\Exception\ForbiddenException;

class ApiAuthenticate
{
    /**
     * @Description
     *
     * @Author im.phien
     * @Date   Mar 20, 2024
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     * @throws ForbiddenException
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if(!Auth::check()) {
            throw new ForbiddenException(__('forbidden.forbidden'), Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}