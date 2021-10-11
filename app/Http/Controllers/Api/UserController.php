<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //LOGIN METHOD - POST
    public function login(Request $request)
    {
        //validate input
        $login_data = $request->validate([
            'emailAddress' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($login_data)) {
            return response()->json([
                'status' => false,
                'message' => "Invalid credentials"
            ]);
        }

        $token = auth()->user()->createToken('auth_token')->accessToken;

        return response()->json([
            'status' => true,
            'message' => "User logged in successfully",
            'access_token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        //get token value
        $token = $request->user()->token();

        //revoke token value
        $token->revoke();

        return response()->json([
            'status' => true,
            'message' => "User logged out successfully"
        ]);
    }

    //Provide simple details of user (name, email, phone)
    public function userList()
    {
        $users = User::get(['fullName', 'emailAddress', 'phoneNumber'])->makeHidden(['profile_photo_url']);

        return response()->json([
            'status' => 1,
            'message' => "User List",
            'data' => $users
        ]);
    }
}
