<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
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
            ]);
        }

        return response(json_encode([
            'msg'=>'error auth'
        ]),401);
    }

    public function something()
    {
        return response(json_encode([
            'msg'=>Auth::user()
        ]),200);
    }
}
