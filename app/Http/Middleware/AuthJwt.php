<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;

class AuthJwt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (TokenExpiredException $e) {
            abort(Response::HTTP_UNAUTHORIZED, 'Token has expired');
        } catch (TokenInvalidException $e) {
            abort(Response::HTTP_UNAUTHORIZED, 'Token is invalid');
        } catch (JWTException $e) {
            abort(Response::HTTP_UNAUTHORIZED, 'Token is not provided');
        } catch (\Exception $e) {
            abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized');
        }

        return $next($request);
    }
}
