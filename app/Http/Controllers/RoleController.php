<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Traits\ResponseTrait;
use App\Models\Role;
use App\Services\RoleService;

class RoleController extends Controller
{
    use ResponseTrait;
    
    protected $roleService;

    function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = $this->roleService->all();
        return $this->commonResponse($roles);
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
    public function store(StoreRoleRequest $request)
    {
        $role = $request->all();
        $created = $this->roleService->add($role);
        if($created) {
            return $this->commonResponse(null, 'Successfully created');
        } else {
            return $this->commonResponse(null, 'Failed to create', false);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return $this->commonResponse($role);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $status = $this->roleService->edit($role, $request->all());
        if ($status) {
            return $this->commonResponse($role);
        } else {
            return $this->commonResponse(null, 'Failed to update', false);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $status = $this->roleService->delete($role);
        if($status) {
            return $this->commonResponse(null, 'Deleted successfully');
        } else {
            return $this->commonResponse(null, 'Failed to Delete', false);
        }
    }
}
