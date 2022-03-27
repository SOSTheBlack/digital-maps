<?php

namespace App\Http\Requests\Api\PointInterests\Approximations;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read string $name
 * @property-read int $latitude
 * @property-read int $longitude
 * @property-read string $opened
 * @property-read string $closed
 */
class StorageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'latitude' => ['required', 'numeric', 'gt:0'],
            'longitude' => ['required', 'numeric', 'gt:0'],
            'meters' => ['required', 'numeric', 'gt:0'],
            'time' => ['required', 'date_format:H:i'],
        ];
    }
}
