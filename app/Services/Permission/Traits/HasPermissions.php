<?php
namespace App\Services\Permission\traits;

use App\Models\Permission;

trait HasPermissions{

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissionsTo( ... $permissions ){
        $permissions = $this->getAllPermissions($permissions);
        if($permissions->isEmpty()) return $this;

        $this->permissions()->syncWithoutDetaching($permissions);

        return $this;
    }

    public function withdrawPermissions( ... $permissions ){
        $permissions = $this->getAllPermissions($permissions);

        $this->permissions()->detach($permissions);

        return $this;
    }

    public function refreshPermissions( ... $permissions ){
        $permissions = $this->getAllPermissions($permissions);

        $this->permissions()->sync($permissions);

        return $this;
    }


    public function hasPermission(Permission $permissions){
        return $this->hasPermissionTroughRole($permissions) || $this->permissions->contains($permissions);
    }

    public function hasPermissionTroughRole(Permission $permissions){
        foreach($permissions->roles as $role){
            return $this->roles->contains($role) ? true : false;
        }
        return false;
    }

    protected function getAllPermissions($permissions){
        return Permission::whereIn("name" , $permissions )->get(); 
    }

  

}