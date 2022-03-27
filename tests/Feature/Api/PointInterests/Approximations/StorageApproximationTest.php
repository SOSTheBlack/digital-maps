<?php

namespace Api\PointInterests\Approximations;

use App\Models\Approximation;
use App\Models\PointInterest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\ApiTestHelper;
use Tests\TestCase;

class StorageApproximationTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    use ApiTestHelper;

    public function test_guest_user_create_a_approximation()
    {
        $response = $this->postJson(route('point-interests.approximations.storage'), []);

        $response
            ->assertUnauthorized()
            ->assertExactJson([
                'message' => 'Unauthenticated.'
            ]);
    }

    public function test_create_new_approximation_with_empty_data()
    {
        $response = $this
            ->withToken($this->generateToken())
            ->postJson(route('point-interests.approximations.storage'), []);

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

    public function test_create_approximation_with_success()
    {
        PointInterest::factory()->count(50)->create();
        $makeApproximation = Approximation::factory()->make();

        $response = $this
            ->withToken(User::factory()->create()->createToken('tests')->plainTextToken)
            ->postJson(route('point-interests.approximations.storage'), $makeApproximation->toArray());

        $response
            ->assertSuccessful()
            ->assertOk()
            ->assertJsonCount(1)
            ->assertJsonCount(8, 'data')
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
                        'owner'
                    ]
                ]
            ]);
    }

    /**
     * @dataProvider missingFieldsRequired
     */
    public function test_register_new_approximation_with_missing_specific_required_data(string $field)
    {
        $newApproximation = Approximation::factory()->make([$field => null])->toArray();

        $response = $this
            ->withToken($this->generateToken())
            ->postJson(route('point-interests.approximations.storage'), $newApproximation);

        $response
            ->assertUnprocessable()
            ->assertJsonCount(2)
            ->assertJsonCount(1, 'errors')
            ->assertJsonStructure([
                'message',
                'errors' => [$field]
            ]);
    }

    public function missingFieldsRequired(): array
    {
        return [
            ['latitude'],
            ['longitude'],
            ['meters'],
            ['time'],
        ];
    }
}
