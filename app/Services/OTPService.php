<?php

namespace App\Services;

use App\Notifications\OTPNotification;
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
}
