<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        dd($credentials);
        if (Auth::attempt($credentials)) {
            dd('auth if');

            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;
            Log::info('Token created:', ['token' => $token]);
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
