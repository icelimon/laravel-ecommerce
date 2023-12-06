<?php

namespace App\Services;

use App\Models\Resource;

class ResourceService 
{
    /**
     * Find all
     */
    public function all()
    {
        return Resource::paginate();
    }
    /**
     * Add new resource
     */
    public function add($data)
    {
        return Resource::create($data);
    }

    /**
     * Update existing resource
     */
    public function edit($resource, $data)
    {
        return $resource->update($data);
    }

    /**
     * Delete the resource
     */
    public function delete($resource)
    {
        return $resource->delete();
    }
}