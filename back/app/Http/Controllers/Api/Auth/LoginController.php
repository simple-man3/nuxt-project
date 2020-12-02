<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginUser()
    {
        $arUserData=[
            'name'=>'user',
            'password'=>123456
        ];

        if (Auth::attempt($arUserData)) {
            $token=Auth::user()->createToken(config('app.name'));

            return response()->json([
                'access_token' => $token->accessToken,
                'user'=>auth()->user()
            ]);
        }

        return response(json_encode([
            'msg'=>'error auth'
        ]),401);
    }

    public function logout()
    {
        \auth()->user()->token()->revoke();

        return response(json_encode([
            'msg'=>'success logout!'
        ]),200);
    }
}
