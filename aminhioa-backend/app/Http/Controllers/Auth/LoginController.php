<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login(Request $request)
    {
        $rand = random_int(100000, 999999);
        $user = User::where('mobile', (int)$request->mobile)->first();
        if ($user) {
            $user->update([
                'mobile_verify_code' => $rand,
                'mobile_verified_at' => null,
            ]);

            $token = Auth::login($user);
            return $this->respondWithToken($token, $rand);
        } else {
            return response()->json(['message' => 'این شماره در سامانه ثبت نشده است.'], 401);
        }
//        $credentials = request(['email', 'password']);
//
//        if (! $token = auth()->attempt($credentials)) {
//            return response()->json(['error' => 'Unauthorized'], 401);
//        }
//
//        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token, $rand)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'message' => 'کد تاییده شما: '.$rand
        ]);
    }
}
