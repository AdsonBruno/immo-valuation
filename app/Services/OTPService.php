<?php

namespace App\Services;

use App\Models\User;
use App\Notifications\OTPNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use TechEd\SimplOtp\Models\SimplOtp as ModelsSimplOtp;
use TechEd\SimplOtp\SimplOtp;

class OTPService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function generateOTP($user) 
    {
        $otpToken = SimplOtp::generate($user->email);

        $user->notify(new OTPNotification($otpToken));

        return $otpToken;
    }

    public function verifyOTP(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|string|max:' . config('simplotp.otp.length'),
        ]);

        if ($validator->fails()) {
            return [
                'status' => 'error',
                'error' => 'Invalid OTP input.', 
                'details' => $validator->errors()
            ];
        }

        $otp = $request->input('otp');

        $otpRecord = ModelsSimplOtp::where('token', $otp)
            ->where('valid_until', '>', now())
            ->first();
        
        if (!$otpRecord) {

            return [
                'status' => 'error',
                'message' => config('simplotp.error_messages.invalid_otp')
            ]; 
        }


        return [
            'status' => 'success',
            'message' => 'Successfully validated OTP.'
        ];
    }
}
