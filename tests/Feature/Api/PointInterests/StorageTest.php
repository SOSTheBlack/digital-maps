<?php

namespace Tests\Feature\Api\PointInterests;

use App\Models\PointInterest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoragePointInterestTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_guest_user_create_new_interest()
    {
        $response = $this->postJson(route('point-interests.storage'), []);

        $response
            ->assertUnauthorized()
            ->assertExactJson([
                'message' => 'Unauthenticated.'
            ]);
    }

    public function test_create_new_interest_with_empty_data()
    {
        $response = $this
            ->withToken(User::factory()->create()->createToken('tests')->plainTextToken)
            ->postJson(route('point-interests.storage'), []);

        $response
            ->dump()
            ->assertUnprocessable()
            ->assertJsonCount(3, 'errors')
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'name',
                    'latitude',
                    'longitude'
                ]
            ]);
    }

    public function test_create_interest_with_success()
    {
        $pointInterest = PointInterest::factory()->make();

        $response = $this
            ->withToken(User::factory()->create()->createToken('tests')->plainTextToken)
            ->postJson(route('point-interests.storage'), $pointInterest->toArray());

        $response
            ->assertSuccessful()
            ->assertCreated()
            ->assertJsonCount(1)
            ->assertJsonCount(8, 'data')
            ->assertJsonStructure([
                'data' => [
                    'uuid',
                    'name',
                    'latitude',
                    'longitude',
                    'opened',
                    'closed',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }

    public function test_create_interest_only_required_fields()
    {
        $pointInterest = PointInterest::factory()->everOpen()->make();

        $response = $this
            ->withToken(User::factory()->create()->createToken('tests')->plainTextToken)
            ->postJson(route('point-interests.storage'), $pointInterest->toArray());

        $response
            ->assertSuccessful()
            ->assertCreated()
            ->assertJsonCount(1)
            ->assertJsonCount(8, 'data')
            ->assertJsonStructure([
                'data' => [
                    'uuid',
                    'name',
                    'latitude',
                    'longitude',
                    'opened',
                    'closed',
                    'created_at',
                    'updated_at',
                ]
            ]);
    }
}
