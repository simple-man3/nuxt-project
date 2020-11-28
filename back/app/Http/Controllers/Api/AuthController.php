<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $arUser=[
            'name'=>'user',
            'password'=>123456,
        ];

        if (Auth::attempt($arUser)) {
            $token = Auth::user()->createToken('qwerty');

            return response()->json([
                'token'=>$token->accessToken
            ],200);
        }

        return response()->json([
            'message'=>'login failed'
        ],403);
//        return response()->json([
//            'message'=>json_encode($arUser)
//        ],200);
    }
}
