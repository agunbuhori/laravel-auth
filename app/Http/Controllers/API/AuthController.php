<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Login user using API
    *
    * @return \Illuminate\Http\Response
    */
    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'name', 'password']);
        
        if (! Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addMonths(3);
        
        $token->save();
        
        return [
            'user' => $user,
            'access_token' => $tokenResult->accessToken,
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ];
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return [
            'message' => 'Successfully logged out'
        ];
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\Response
     */
    public function user(Request $request)
    {
        return $request->user();
    }
}
