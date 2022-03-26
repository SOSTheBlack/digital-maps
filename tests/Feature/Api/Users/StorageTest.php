<?php

namespace Tests\Feature\Api\Users;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StorageTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_new_user_with_empty_data(): void
    {
        $response = $this->postJson(route('users.storage'), []);

        $response
            ->assertUnprocessable()
            ->assertJsonCount(2)
            ->assertJsonCount(3, 'errors')
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'name',
                    'email',
                    'password'
                ]
            ]);
    }

    /**
     * @dataProvider missingFieldsRequired
     */
    public function test_register_new_user_with_missing_specific_required_data(string $field)
    {
        $newUser = User::factory()->make([$field => null])->toArray();

        if ($field !== 'password') {
            $newUser['password'] = bcrypt($this->faker->password());
        }

        $response = $this->postJson(route('users.storage'), $newUser);

        $response
            ->assertUnprocessable()
            ->assertJsonCount(2)
            ->assertJsonCount(1, 'errors')
            ->assertJsonStructure([
                'message',
                'errors' => [$field]
            ]);
    }

    public function test_new_user_with_email_registered()
    {
        $user = User::factory()->create();
        $newUser = User::factory()->make(['email' => $user->email])->toArray();
        $newUser['password'] = bcrypt($this->faker->password());

        $response = $this->postJson(route('users.storage'), $newUser);

        $response
            ->assertUnprocessable()
            ->assertJsonCount(2)
            ->assertJsonCount(1, 'errors')
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'email',
                ]
            ]);
    }

    public function test_if_register_new_user_with_success()
    {
        $newUser = $this->makeUser();

        $response = $this->postJson(route('users.storage'), $newUser);

        $response
            ->assertSuccessful()
            ->assertCreated()
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

    private function makeUser(): array
    {
        $newUser = User::factory()->make()->toArray();
        $newUser['password'] = bcrypt($this->faker->password());

        return $newUser;
    }

    public function missingFieldsRequired(): array
    {
        return [
            ['name'],
            ['password'],
            ['email']
        ];
    }
}
