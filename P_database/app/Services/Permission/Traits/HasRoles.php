<?php

namespace App\Services\Permission\Traits;


use App\Role;

trait HasRoles
{
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function giveRolesTo(...$roles)
    {
        $roles = $this->getAllRoles($roles);

        if ($roles->isEmpty()) return $this;

        $this->roles()->syncWithoutDetaching($roles);

        return $this;
    }

    protected function getAllRoles(array $roles)
    {
        return Role::whereIn('name', $roles[0])->get();
    }

    public function withdrawRoles(...$roles)
    {
        $roles = $this->getAllRoles($roles);

        $this->roles()->detach($roles);

        return $this;
    }

    public function refreshRoles(...$roles)
    {
        $roles = $this->getAllRoles($roles);

        $this->roles()->sync($roles);

        return $this;
    }

    // check user has permission or not
    public function hasRole($role)
    {
        $role = Role::where('name', $role)->first();
        return $this->roles->contains($role);
    }

    public function hasRoleWithName($role)
    {
        return $this->roles->contains('name', $role);
    }

}