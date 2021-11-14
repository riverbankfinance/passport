<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        // if (!Auth::check()) {
        //     return response(['message'=> 'Invalid login credentials.']);
        // }

        $login = $request->validate([
            'email'=>'required|string',
            'password'=>'required|string',
        ]);

        if (!Auth::guard('web')->attempt($login, false, false)) {
        return ['result' => 'Invalid Login Credentials.'];
        }
        else {
            $accessToken = Auth::user()->createToken('authToken')->accessToken;
            return response(['user'=> Auth::user(),'access_token'=> $accessToken]);
        };
    }
}
