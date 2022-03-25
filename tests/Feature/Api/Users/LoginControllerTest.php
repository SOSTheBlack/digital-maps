<?php

namespace Tests\Feature\Api\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_new_login_empty_data()
    {
        $response = $this->postJson(route('users.login'), []);

        $response
            ->assertUnprocessable()
            ->assertJsonCount(2)
            ->assertJsonCount(2, 'errors')
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'email',
                    'password'
                ]
            ]);
    }

    public function test_if_email_not_registered_can_login_with_success()
    {
        User::factory()->create();

        $response = $this->postJson(route('users.login'), [
            'email' => $this->faker->email(),
            'password' => 'password'
        ]);

        $response
            ->assertUnprocessable()
            ->assertJsonCount(1, 'errors')
            ->assertJsonStructure([
                'message',
                'errors' => ['email']
            ]);
    }

    public function test_if_new_user_registered_can_success_login()
    {
        $newUser = User::factory()->create();

        $response = $this->postJson(route('users.login'), [
            'email' => $newUser->email,
            'password' => 'password'
        ]);

        $response
            ->assertSuccessful()
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'uuid',
                    'name',
                    'email',
                    'token',
                    'token_type',
                    'updated_at',
                    'created_at'
                ]
            ]);

        $this->assertDatabaseHas('users', [
            'name' => $newUser['name'],
            'email' => $newUser['email'],
        ]);
    }

    public function test_if_new_token_is_valid()
    {
        $newUser = User::factory()->create();

        $responseLogin = $this->postJson(route('users.login'), [
            'email' => $newUser->email,
            'password' => 'password'
        ]);

        $token = $responseLogin->json('data.token');

        $responseMe = $this
            ->withHeader('Authorization', 'Bearer '.$token)
            ->getJson(route('users.me'));

        $responseMe
            ->assertSuccessful()
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    'uuid',
                    'name',
                    'email',
                    'updated_at',
                    'created_at'
                ]
            ]);
    }

    public function missingFieldsRequired(): array
    {
        return [
            ['password'],
            ['email']
        ];
    }
}
