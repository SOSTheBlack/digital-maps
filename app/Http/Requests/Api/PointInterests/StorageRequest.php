<?php

namespace App\Http\Requests\Api\PointInterests;

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
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'latitude' => ['required', 'numeric', 'gt:0'],
            'longitude' => ['required', 'numeric', 'gt:0'],
            'opened' => ['required_with:closed', 'nullable', 'date_format:H:i'],
            'closed' => ['required_with:opened', 'nullable', 'date_format:H:i', 'after:opened'],
        ];
    }
}
