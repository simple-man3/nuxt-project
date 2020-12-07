<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getAuthUser(Request $request)
    {
        return response(json_encode([
            'user'=>auth()->user(),
        ]),200);
    }

    public function userAccess()
    {
        return response([
            'msg'=>'good!'
        ],200);
    }
}
