<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray(): array
    {
        $fields = collect([
            'uuid' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        if (isset($this->token)) {
            $fields
                ->put('token', Str::after((string) $this->token, '|'))
                ->put('token_type', 'Bearer');
        }

        return $fields->toArray();
    }
}
