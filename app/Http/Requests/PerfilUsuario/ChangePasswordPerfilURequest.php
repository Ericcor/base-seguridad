<?php
namespace App\Http\Requests\PerfilUsuario;

use App\Http\Requests\Request;
use  App\Models\Seguridad\PasswordRequirements;


class ChangePasswordPerfilURequest extends Request 
{
    public $min;
    public $max;
    public $expression;
    public $msj_expression;

    public function  __construct (){
       $this->min = PasswordRequirements::where('cod_requirement', '0001')->first()->value; 
       $this->max = PasswordRequirements::where('cod_requirement', '0002')->first()->value;
      // $this->num = PasswordRequirements::where('cod_requirement', '0003')->first()->value;
       $this->expression = "";
       $this->msj_expression = ""; 

        $regex = PasswordRequirements::where('regex', '1')->where('status', '1')->get();
        if (count($regex)>0 ){ 
        foreach ($regex as $registro) {
               
                $this->expression = '|regex:'. $registro->value.$this->expression;
                $this->msj_expression =$registro->message.','.$this->msj_expression;  
        
             }
        }else{
             $this->expression='';
             $this->msj_expression='';
        }

    }
   
    public function authorize()
    {
     return true;
    }

    public function rules()
    {
       
        return [
            'old_password' => 'required',
            'password'              => 'required|min:'. $this->min.'|max:'.$this->max.$this->expression,
            'password_confirmation' => 'required',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La nueva contraseña debe tener al menos '.$this->min.' caracteres',
            'password.max' => 'La nueva contraseña no debe tener mas  '.$this->max.' caracteres',
            'password.regex' => 'La nueva contraseña debe tener '.$this->msj_expression,
            'password_confirmation.required' => 'La contraseña de confirmación es requerida.',
            'password_confirmation.same' => 'La nueva contraseña debe coincidir con la confirmación de contraseña.',
            'old_password.required' => 'La contraseña actual es requerida.',
        ];
    }
}

