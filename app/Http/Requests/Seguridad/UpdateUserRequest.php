<?php

namespace App\Http\Requests\Seguridad;

use App\Http\Requests\Request;

/**
 * Class UpdateUserRequest
 * @package App\Http\Requests\Backend\Access\User
 */
class UpdateUserRequest extends Request
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
            'email' => 'required',
            'name'  => 'required',
            'assignees_roles'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido.',
            'email.required' => 'El usuario es requerido.',
            'assignees_roles.required' => 'El usuario debe tener al menos un rol asociado.'
        ];
    }
}
