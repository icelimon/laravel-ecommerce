<?php

namespace App\Services;

use App\Models\Product;

class ProductService 
{
    /**
     * Add new product
     */
    public function add($data)
    {
        return Product::create($data);
    }
}