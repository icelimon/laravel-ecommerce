<?php

namespace App\Services;

use App\Models\Role;

class RoleService 
{
    /**
     * Find all
     */
    public function all()
    {
        return Role::paginate();
    }
    /**
     * Add new role
     */
    public function add($data)
    {
        return Role::create($data);
    }

    /**
     * Update existing role
     */
    public function edit($role, $data)
    {
        return $role->update($data);
    }

    /**
     * Delete the role
     */
    public function delete($role)
    {
        return $role->delete();
    }
}