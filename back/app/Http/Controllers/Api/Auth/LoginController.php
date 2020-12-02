<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginUser(Request $request)
    {
        $arUserData=[
            'name'=>'user',
            'password'=>123456,
            'email'=>'example@gmail.com',
        ];
        $http = new \GuzzleHttp\Client;

        $response = $http->post('http://backend.com/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 5,
                'client_secret' => 'tcO39LRSKzPZn0JNzBhbdmpIIFFmVVzhIAz9rYQR',
                'username' => $arUserData['email'],
                'password' => $arUserData['password'],
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function logout()
    {
        \auth()->user()->token()->revoke();

        return response(json_encode([
            'msg'=>'success logout!'
        ]),200);
    }
}
