<?php

namespace App\models\Traits;

trait PermisionModule
{
    public function hasPermissionModule($module)
    {
        $roles = $this->roles()->get();

        foreach ($roles as $role) {

            if ($role->todos == 1 || $role->permissions()->where('module', '=', $module)->exists()) {
                return true;
            }
        }

        return false;
    }

     public function hasPermission($permission)
    {

    $roles = $this->roles()->get();


                            foreach ($roles as $role) {

                                        foreach ($permission as $perm) {

                                            if ($role->todos == 1 || $role->permissions()->where('name', '=', $perm)->exists()) {
                                                return true;
                                            }

                                        }
                            }

        return false;

    }
}
