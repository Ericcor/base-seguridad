<?php

namespace App\Http\Requests\PerfilUsuario;

use App\Http\Requests\Request;

/**
 * Class UpdateUserRequest
 * @package App\Http\Requests\Access\User
 */
class UpdateAvatarRequest extends Request
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
            'logotipo' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            //
        ];
    }
}
