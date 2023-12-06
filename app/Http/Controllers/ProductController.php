<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Traits\ResponseTrait;
use App\Models\Product;
use App\Services\ProductService;

class ProductController extends Controller
{
    use ResponseTrait;
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productService->all();
        return $this->commonResponse($products);
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
    public function store(StoreProductRequest $request)
    {
        $product = $request->all();
        $created = $this->productService->add($product);
        if($created) {
            return $this->commonResponse(null, 'Successfully created');
        } else {
            return $this->commonResponse(null, 'Failed to create', false);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->commonResponse($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $status = $this->productService->edit($product, $request->all());
        if ($status) {
            return $this->commonResponse($product, 'Successfully updated');
        } else {
            return $this->commonResponse($product, 'Failed to update', false);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $status = $this->productService->delete($product);
        if($status) {
            return $this->commonResponse(null, 'Deleted successfully');
        } else {
            return $this->commonResponse(null, 'Failed to Delete', false);
        }
    }
}
