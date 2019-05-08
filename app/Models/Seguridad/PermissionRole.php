<?php

namespace App\Models\Seguridad;

use App\User;
use App\Models\Seguridad\Role;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seguridad\Permission;
use OwenIt\Auditing\Contracts\Auditable;


class PermissionRole extends Model implements Auditable 
{
    use \OwenIt\Auditing\Auditable;
    
     protected $table= 'permission_role';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['permission_id', 'role_id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $primarykey = 'id';
    public $timestamps = false;
    /**
     * @var array
     */

    public function permission()
    {
        return $this->belongsToMany(Permission::class,'id', 'permission_id' );
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'id', 'role_id' );
    }
}
