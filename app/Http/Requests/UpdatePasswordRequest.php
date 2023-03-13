<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8|regex:/[a-zA-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|confirmed',
            
        ];
    }

    public function messages(){
        return [
            'email' => 'Email incorrect.',

            'email.required' => 'L\'email doit être complété.',

            'password.min' => 'Le mot de passe doit contenir minimum 8 caractères.',
            'password.regex' => 'Le mot de passe doit contenir au moin une lettre',
            'password.regex' => 'Le mot de passe doit contenir au moin un numéro',
            'password.regex' => 'Le mot de passe doit contenir au moin un caractère spécial (@$!%*#?&)',
            'password.confirmed' => 'Les mots de passe doivent correspondre',
        ];
    }
}
