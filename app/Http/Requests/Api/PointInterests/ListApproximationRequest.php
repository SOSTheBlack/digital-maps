<?php

namespace App\Http\Requests\Api\PointInterests;

use Illuminate\Foundation\Http\FormRequest;

class ListApproximationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return ! auth()->guest();
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
