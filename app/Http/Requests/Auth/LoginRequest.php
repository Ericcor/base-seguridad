<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

/**
 * Class LoginRequest
 * @package App\Http\Requests\Auth
 */
class LoginRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //'email'    => 'required|email',
            'email'    => 'required',
            'password' => 'required',

        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [

          'email.required' => 'El Usuario es requerido.',
          //'email.email' => 'El Correo Electrónico debe ser una dirección válida.',
          'password.required' => 'La Contraseña es requerida.',
        ];
    }
}
