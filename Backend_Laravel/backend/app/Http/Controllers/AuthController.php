<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){

            $user = Auth::user();

            return response()->json([
                'message' => 'Login succesvol',
                'email' => $user->email,
                'name' => $user->name,
                'role' => $user->role
            ]);
        }

        return response()->json(['error'=>'Login mislukt'],401);
    }
}