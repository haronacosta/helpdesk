<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PassportAuthController extends Controller
{
    /**
     * Registration
     */
    public function register(StoreUserRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('HelpdeskAuth')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $token = Auth::user()->createToken('HelpdeskAuth')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }
    }
}
