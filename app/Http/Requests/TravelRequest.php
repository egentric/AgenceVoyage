<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'intro' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required',
            'departCity' => 'required',
            'destinationCity' => 'required',
            'themes' => 'required',
            'types' => 'required',
        ];
    }
}
