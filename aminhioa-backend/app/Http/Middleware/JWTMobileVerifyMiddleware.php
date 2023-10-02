<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMobileVerifyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
//        try {
//            $user = JWTAuth::parseToken()->authenticate();
//            if (!$user) {
//                return response()->json(['message' => 'user not found'], 500);
//            } else {
//                if($user->mobile_verified_at == null) {
//                    return response()->json(['code' => 'not_verified', 'message' => 'کد شما مورد تایید نشده است!']);
//                }
//            }
//        } catch (JWTException $e) {
//            return response()->json(['message' => $e->getMessage()], 500);
//        }
        return $next($request);
    }
}
