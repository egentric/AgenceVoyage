<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|min:8|regex:/[a-zA-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required',
            'phone' => 'required',
        ];
    }

    public function messages(){
        return [
            'email' => 'Email incorrect.',

            'email.required' => 'L\'email doit être complété.',
            'firstName.required' => 'Le prénom doit être rempli.',
            'lastName.required' => 'Le nom doit être rempli',
            'address.required' => 'L\'addresse doit être complétée.',
            'city.required' => 'La ville doit être remplie',
            'zip.required' => 'Le code postal doit être rempli',
            'phone.required' => 'Le numéro de téléphone doit être complété',
            'password.required' => 'Le mot de passe doit être complété.',

            'email.unique' => 'L\'email est déjà utilisé pour un autre compte.',

            'password.min' => 'Le mot de passe doit contenir minimum 8 caractères.',
            'password.regex' => 'Le mot de passe doit contenir au moin une lettre',
            'password.regex' => 'Le mot de passe doit contenir au moin un numéro',
            'password.regex' => 'Le mot de passe doit contenir au moin un caractère spécial (@$!%*#?&)',
        ];
    }
}
