<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use  App\Models\Seguridad\Role;
use App\Models\Traits\PermisionModule;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Access\PasswordChange\PasswordChange;
use OwenIt\Auditing\Contracts\Auditable;
use Carbon\Carbon;


class User extends Authenticatable implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;
    use SoftDeletes;
    use PermisionModule;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'status', 'status_description', 'confirmation_code', 'confirmed'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
        {
            return $this->belongsToMany(Role::class, 'assigned_roles')
             ->withPivot('role_id');
        }

    public function password_changes()
    {
        return $this->hasMany(PasswordChange::class);
    }

    public function isNew()
    {
        // Comentado hasta que se resuleva los requerimientos de seguridad.
        //return $this->password_changes->count() == 0;
        return false;
    }

    public function transformAudit(array $data): array
    {   

        /*******
        * 
        * formatemos los campos que contienen fechas con carbon para no traer un array si no un formato en especifico
        * 
        ********/

        // format last login
        if (!empty($data['new_values']['last_login'])) {
                $data['new_values']['last_login'] = Carbon::parse($data['new_values']['last_login'])->format('d-m-Y H:i:s');
        }
        if (!empty($data['old_values']['last_login'])) {
            $data['old_values']['last_login'] = Carbon::parse($data['old_values']['last_login'])->format('d-m-Y H:i:s');
        }
        // format created_at
        if (!empty($data['new_values']['created_at'])) {
                $data['new_values']['created_at'] = Carbon::parse($data['new_values']['created_at'])->format('d-m-Y H:i:s');
        }
        if (!empty($data['old_values']['created_at'])) {
            $data['old_values']['created_at'] = Carbon::parse($data['old_values']['created_at'])->format('d-m-Y H:i:s');
        }
        // format updated_at
        if (!empty($data['new_values']['updated_at'])) {
                $data['new_values']['updated_at'] = Carbon::parse($data['new_values']['updated_at'])->format('d-m-Y H:i:s');
        }
        if (!empty($data['old_values']['updated_at'])) {
            $data['old_values']['updated_at'] = Carbon::parse($data['old_values']['updated_at'])->format('d-m-Y H:i:s');
        }
        // format deleted_at
        if (!empty($data['new_values']['deleted_at'])) {
                $data['new_values']['deleted_at'] = Carbon::parse($data['new_values']['deleted_at'])->format('d-m-Y H:i:s');
        }
        if (!empty($data['old_values']['deleted_at'])) {
            $data['old_values']['deleted_at'] = Carbon::parse($data['old_values']['deleted_at'])->format('d-m-Y H:i:s');
        }
        
        return $data;
    }

}
