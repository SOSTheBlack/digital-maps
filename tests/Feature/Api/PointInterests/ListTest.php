<?php

namespace Tests\Feature\Api\PointInterests;

use App\Models\PointInterest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\ApiTestHelper;
use Tests\TestCase;

class ListTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use ApiTestHelper;

    public function test_guest_user_list_all_interest()
    {
        $response = $this->getJson(route('point-interests.list'));

        $response
            ->assertUnauthorized()
            ->assertExactJson([
                'message' => 'Unauthenticated.'
            ]);
    }

    public function test_list_all_interest_with_success()
    {
        PointInterest::factory()->count(50)->create();

        $response = $this
            ->withToken(self::generateToken())
            ->getJson(route('point-interests.list'));

        $response
            ->assertSuccessful()
            ->assertOk()
            ->assertJsonCount(15, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'uuid',
                        'name',
                        'latitude',
                        'longitude',
                        'opened',
                        'closed',
                        'created_at',
                        'updated_at',
                        'owner' => [
                            'uuid',
                            'name',
                            'email',
                            'updated_at',
                            'created_at'
                        ]
                    ]
                ]
            ]);
    }
}
