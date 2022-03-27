<?php

namespace App\Http\Resources;

use App\Models\Approximation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Approximation
 */
class ApproximationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'uuid' => $this->uuid,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'meters' => $this->meters,
            'time' => $this->time->format('H:i'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'owner' => new UserResource($this->owner)
        ];
    }
}
