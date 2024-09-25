<?php

namespace Tests\Feature\Http\Controllers\api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp():void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * A basic feature test example.
     */
    public function testShouldReturn422IfTheNameIsNotPassed() 
    {
        $response = $this->postJson('api/v1/user', [
            'email' => 'test@exemple.com',
            'password' => 'password123',
            'creci_number' => '1234567',
            'profile_picture' => 'http://url.com.br',
            'city' => 'Arapiraca',
            'state' => 'Alagoas',
            'date_of_birth' => '07011997',
            'is_verified' => 'true'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('name');
    }

    public function testShouldReturn422IfTheEmailIsNotPassed() 
    {
        $response = $this->postJson('api/v1/user', [
            'name' => 'Fulano de tal',
            'password' => 'password123',
            'creci_number' => '1234567',
            'profile_picture' => 'http://url.com.br',
            'city' => 'Arapiraca',
            'state' => 'Alagoas',
            'date_of_birth' => '07011997',
            'is_verified' => 'true'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('email');
    }

    public function testShouldReturn422IfThePasswordIsNotPassed() 
    {
        $response = $this->postJson('api/v1/user', [
            'name' => 'Fulano de tal',
            'email' => 'test@exemple.com',
            'creci_number' => '1234567',
            'profile_picture' => 'http://url.com.br',
            'city' => 'Arapiraca',
            'state' => 'Alagoas',
            'date_of_birth' => '07011997',
            'is_verified' => 'true'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('password');
    }

    public function testShouldReturn422IfTheCreciNumberIsNotPassed() 
    {
        $response = $this->postJson('api/v1/user', [
            'name' => 'Fulano de tal',
            'email' => 'test@exemple.com',
            'password' => 'password123',
            'profile_picture' => 'http://url.com.br',
            'city' => 'Arapiraca',
            'state' => 'Alagoas',
            'date_of_birth' => '07011997',
            'is_verified' => 'true'
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('creci_number');
    }

    public function testShouldReturn201IfUserIsCreated() {
        $response = $this->postJson('api/v1/user', [
            'name' => 'Fulano de tal',
            'email' => 'test@exemple.com',
            'password' => 'password123',
            'creci_number' => '1234567',
            'profile_picture' => 'http://url.com.br',
            'city' => 'Arapiraca',
            'state' => 'Alagoas',
            'date_of_birth' => '1997-01-07',
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'User successfully registered!',
                'user' => [
                    'name' => 'Fulano de tal',
                    'email' => 'test@exemple.com',
                    'creci_number' => '1234567',
                    'profile_picture' => 'http://url.com.br',
                    'city' => 'Arapiraca',
                    'state' => 'Alagoas',
                    'date_of_birth' => '1997-01-07',
                    'is_verified' => 'true'
                ],
                'statusCode' => 201
            ]);
    }

}
