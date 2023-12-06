<?php

namespace App\Services;

use App\Models\Policy;

class PolicyService 
{
    /**
     * Find all
     */
    public function all()
    {
        return Policy::paginate();
    }
    /**
     * Add new policy
     */
    public function add($data)
    {
        return Policy::create($data);
    }

    /**
     * Update existing policy
     */
    public function edit($policy, $data)
    {
        return $policy->update($data);
    }

    /**
     * Delete the policy
     */
    public function delete($policy)
    {
        return $policy->delete();
    }
}