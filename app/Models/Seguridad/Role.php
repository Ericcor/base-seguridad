<?php

namespace App\Models\Seguridad;

use Illuminate\Database\Eloquent\Model;
use App\Models\Seguridad\Permission;
use App\User;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * Class Role
 * @package App\Models\Access\Role
 */
class Role extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table;

    protected $fillable = ['name', 'todos', 'SORT'];

    public function permissions()
        {
            return $this->belongsToMany(Permission::class, 'permission_role')
             ->withPivot('permission_id');
        }

     public function users()
        {
            return $this->belongsToMany(user::class, 'assigned_roles')
             ->withPivot('user_id');
        }
}
