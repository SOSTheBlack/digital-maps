<?php

namespace Tests\Feature\Api;

use App\Models\User;

trait ApiTestHelper
{
    public static function generateToken(): string
    {
        return User::factory()->create()->createToken('tests')->plainTextToken;
    }
}
