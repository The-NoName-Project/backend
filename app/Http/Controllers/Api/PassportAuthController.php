<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PassportAuthController extends Controller
{
    /**
     * Registration Req
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'phone'=> 'required|max:11',
            'nickname' => 'required|min:4',
        ]);

        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'nickname' => $request->nickname,
            //tipo de usuario siempre sera 0
            'type' => 0,
        ]);

        $token = $user->createToken('PassportAuth')->accessToken;

        return response()->json(['token' => $token, 'user' => $user], 201);
    }

    /**
     * Login Req
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            //obtiene los datos del usuario sin necesidad de pasarle el token
            $user = auth()->user();
            $token = $user->createToken('PassportAuth')->accessToken;
            return response()->json(['token' => $token, 'user' => $user], 200);
            // $token = auth()->user()->createToken('Laravel-9-Passport-Auth')->accessToken;
            // return response()->json(['token' => $token, 'user' => ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function userInfo()
    {
     $user = auth()->user();
     return response()->json( $user, 200);
    }

    /**
     * Rescure password
     */

    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->sendPasswordResetNotification($request->email);
        return response()->json(['message' => 'Reset password link sent to your email'], 200);
    }

    /**
     * Reset password
     */
    public function resetPasswordConfirm(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8',
            'token' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json(['message' => 'Password reset successfully'], 200);
    }

}
