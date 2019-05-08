<?php

namespace App\Models\Seguridad;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class PasswordRequirements extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $table = 'password_requirements';
    protected $primarykey = 'id';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'status', 'description', 'value', 'cod_requirement', 'regex', 'message'];
    protected $appends  = ['status_tra', 'required'];
    public $timestamps = false;

    public function getStatusTraAttribute(){
        
		      	if ($this->status == 1){
		      		return 'ACTIVO';
		      }else {
		      	return 'INACTIVO';
		    }
    }

    public function getRequiredAttribute(){
        
		      	if ($this->regex == 0){
		      		return 'SI';
		      }else {
		      	return 'NO';
		    }
    }

}
