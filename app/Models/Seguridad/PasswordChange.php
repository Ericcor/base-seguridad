<?php

namespace App\Models\Seguridad;

use App\User;
use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;


class PasswordChange extends Model
{

     //use Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'password', 'created_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password'];

    const UPDATED_AT = null;

    /**
     * @var array
     */
    protected $dates = ['created_at'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
