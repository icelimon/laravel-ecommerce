<?php

namespace App\Services;

use App\Models\Product;

class ProductService 
{
    /**
     * Find all
     */
    public function all()
    {
        return Product::paginate();
    }
    /**
     * Add new product
     */
    public function add($data)
    {
        return Product::create($data);
    }

    /**
     * Update existing product
     */
    public function edit($product, $data)
    {
        return $product->update($data);
    }

    /**
     * Delete the product
     */
    public function delete($product)
    {
        return $product->delete();
    }
}