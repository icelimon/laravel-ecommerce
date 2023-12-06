<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePolicyRequest;
use App\Http\Requests\UpdatePolicyRequest;
use App\Http\Traits\ResponseTrait;
use App\Models\Policy;
use App\Services\PolicyService;

class PolicyController extends Controller
{
    use ResponseTrait;

    protected $policyService;

    public function __construct(PolicyService $policyService)
    {
        $this->policyService = $policyService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $policies = $this->policyService->all();
        return $this->commonResponse($policies);
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
    public function store(StorePolicyRequest $request)
    {
        $policy = $request->all();
        $created = $this->policyService->add($policy);
        if($created) {
            return $this->commonResponse(null, 'Successfully created', true);
        } else {
            return $this->commonResponse(null, 'Failed to create', false);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Policy $policy)
    {
        return $this->commonResponse($policy);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Policy $policy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePolicyRequest $request, Policy $policy)
    {
        $status = $this->policyService->edit($policy, $request->all());
        if ($status) {
            return $this->commonResponse($policy);
        } else {
            return $this->commonResponse(null, 'Failed to update', false);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Policy $policy)
    {
        $status = $this->policyService->delete($policy);
        if($status) {
            return $this->commonResponse(null, 'Deleted successfully', true);
        } else {
            return $this->commonResponse(null, 'Failed to Delete', false);
        }
    }
}
