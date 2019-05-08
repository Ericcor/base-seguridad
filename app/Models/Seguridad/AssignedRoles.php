<?php

namespace App\Models\Seguridad;

use App\user;
use App\Models\Seguridad\Role;
use Illuminate\Database\Eloquent\Model;

class AssignedRoles extends Model
{
     protected $table= 'assigned_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'role_id'];
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

    public function users()
    {
        return $this->belongsToMany(User::class,'id', 'user_id' );
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class,'id', 'role_id' );
    }
}
