<?php

namespace Tests\Feature\Services;

use App\Models\User;
use App\Services\OTPService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Notifications\OTPNotification;
use Tests\TestCase;

class OTPServiceTest extends TestCase
{   
    use RefreshDatabase;


    public function testShouldReturn201IfOTPSuccessfullyGenerate() 
    {
       $user = User::factory()->create();

       $otpServiceMock = $this->getMockBuilder(OTPService::class)
            ->onlyMethods(['generateOTP'])
            ->getMock();

        $otpServiceMock->expects($this->once())
                       ->method('generateOTP')
                       ->with($user)
                       ->willReturn('123456');

       $otpToken = $otpServiceMock->generateOTP($user);

       $this->assertNotNull($otpToken);
       $this->assertEquals('123456', $otpToken);
    }
}
