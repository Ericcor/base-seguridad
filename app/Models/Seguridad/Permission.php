<?php

namespace App\Models\Seguridad;

use Illuminate\Database\Eloquent\Model;
//use App\Models\Seguridad\Role;
//use App\Models\Access\Permission\Traits\Relationship\PermissionRelationship;

/**
 * Class Permission
 * @package App\Models\Access\Permission
 */
class Permission extends Model
{
  //  use PermissionRelationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'display_name', 'SORT'];

    /**
     * @param array $attributes
     */
 /*   public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('access.permissions_table');
    }*/
}
