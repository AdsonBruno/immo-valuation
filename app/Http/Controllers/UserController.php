<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\OTPNotification;
use App\Services\OTPService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

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
        ]);

        $otpToken = $this->otpService->generateOTP($user);

        $user->notify(new OTPNotification($otpToken));

        return response()->json([
            'message' => 'User successfully registered!',
            'user' => $user,
            'statusCode' => 201
        ], 201);

    }

    public function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|string|max:6'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validator failed',
                'errors' => $validator->errors(),
                'statusCode' => 422
            ], 422);
        }

        $result = $this->otpService->verifyOTP($request);
        
        if ($result['status'] === 'error'){
            return response()->json([
                'message' => 'OTP validation failed',
                'result' => $result,
                'statusCode' => 400
            ], 400);
        }

        
        return response()->json([
            'message' => 'Successfully validate',
            'result' => $result,
            'statusCode' => 200
        ]);

    }
    
}
