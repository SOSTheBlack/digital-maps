<?php

namespace Tests\Feature\Api\PointInterests;

use App\Models\PointInterest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListApproximationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_user_find_interest_approximation()
    {
        $response = $this->postJson(route('point-interests.approximation'), []);

        $response
            ->assertUnauthorized()
            ->assertExactJson([
                'message' => 'Unauthenticated.'
            ]);
    }
}
