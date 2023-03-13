<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'code' => 'required',
            
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Le nom du pays doit être rempli.',
            'code.required' => 'Vous devez inscrire le code iso du pays.',
            
        ];
    }
}
