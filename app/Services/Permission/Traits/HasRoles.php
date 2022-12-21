<?php
namespace App\Services\Permission\traits;

use App\Models\Role;

trait HasRoles{

    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    public function giveRolesTo( ... $roles ){
        $roles = $this->getAllRoles($roles);
        if($roles->isEmpty()) return $this;

        $this->roles()->syncWithoutDetaching($roles);

        return $this;
    }

    public function withdrawRoles( ... $roles ){
        $roles = $this->getAllRoles($roles);

        $this->Roles()->detach($roles);

        return $this;
    }

    public function refreshRoles( ... $roles ){
        $roles = $this->getAllRoles($roles);

        $this->roles()->sync($roles);

        return $this;
    }


    public function hasRole(Role $role){
        return $this->role->contains($role);
    }

    protected function getAllRoles($roles){
        return Role::whereIn("name" , $roles )->get(); 
    }

  

}