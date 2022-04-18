<?php

namespace Tests\Feature\Api\PointInterests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\ApiTestHelper;
use Tests\TestCase;

class ListApproximationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use ApiTestHelper;

    public function test_guest_user_find_interest_approximation()
    {
        $response = $this->postJson(route('point-interests.approximation'), []);

        $response
            ->assertUnauthorized()
            ->assertExactJson([
                'message' => 'Unauthenticated.'
            ]);
    }

    public function test_create_approximation_with_empty_data()
    {
        $response = $this
            ->withToken($this->generateToken())
            ->postJson(route('point-interests.approximation'));

        $response
            ->assertUnprocessable()
            ->assertJsonCount(4, 'errors')
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'latitude',
                    'longitude',
                    'meters',
                    'time',
                ]
            ]);
    }
}
