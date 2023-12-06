<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Http\Traits\ResponseTrait;
use App\Models\Resource;
use App\Services\ResourceService;

class ResourceController extends Controller
{

    use ResponseTrait;

    protected $resourceService;

    public function __construct(ResourceService $resourceService)
    {
        $this->resourceService = $resourceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resouces = $this->resourceService->all();
        return $this->commonResponse($resouces);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourceRequest $request)
    {
        $resource = $request->all();
        $created = $this->resourceService->add($resource);
        if($created) {
            return $this->commonResponse(null, 'Successfully created');
        } else {
            return $this->commonResponse(null, 'Failed to create', false);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        return $this->commonResponse($resource);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResourceRequest $request, Resource $resource)
    {
        $status = $this->resourceService->edit($resource, $request->all());
        if ($status) {
            return $this->commonResponse($resource);
        } else {
            return $this->commonResponse(null, 'Failed to update', false);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        $status = $this->resourceService->delete($resource);
        if($status) {
            return $this->commonResponse(null, 'Deleted successfully');
        } else {
            return $this->commonResponse(null, 'Failed to Delete', false);
        }
    }
}
