<?php

namespace App\Http\Requests\Seguridad;
use App\Http\Requests\Request;

class UpdateRoleRequest extends Request
{

    public function authorize()
    {
      return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre del rol es requerido.',
        ];
    }
}
