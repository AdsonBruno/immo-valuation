<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createUser(Request $request) 
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
            'creci_number' => 'required|string|max:9'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validator failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'creci_number' => $request->creci_number,
            'profile_picture' => $request->profile_picture,
            'city' => $request->city,
            'state' => $request->state,
            'date_of_birth' => $request->date_of_birth,
            'is_verified' => $request->is_verified
        ]);

        return response()->json([
            'message' => 'User successfully registered!',
            'user' => $user,
            'statusCode' => 201
        ], 201);

    }
    
}
