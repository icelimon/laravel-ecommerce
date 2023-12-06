<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CartService 
{
    /**
     * Find all
     */
    public function all()
    {
        return Cache::get('user_cart:' . auth()->id());
    }
    /**
     * Add new cart
     */
    public function add($data)
    {
        // Logic to add item to the cart
        $cartData = Cache::get('user_cart:' . auth()->id()) ?? [];

        $productId = $data['product_id'];
        $quantity = $data['quantity'];

        // Check if the product is already in the cart
        $cartItemIndex = collect($cartData)->search(function ($item) use ($productId) {
            return $item['product_id'] == $productId;
        });

        if ($cartItemIndex !== false) {
            // If the product is already in the cart, update the quantity

            $cartData[$cartItemIndex]['quantity'] += $quantity;
            $cartData[$cartItemIndex]['unit_price'] = $data['unit_price'];

        } else {
            // If the product is not in the cart, add it
            $cartData[] = $data;
        }

        // Store cart data in Redis
        $expirationInSeconds = 60 * 60; // Example: Set expiration to 1 hour
        return Cache::put('user_cart:' . auth()->id(), $cartData, $expirationInSeconds);
    }

    /**
     * Update existing cart
     */
    public function edit($data)
    {
        // Logic to edit item in the cart
        $cartData = Cache::get('user_cart:' . auth()->id()) ?? [];

        $productId = $data['product_id'];
        $newQuantity = $data['quantity'];

        // Find the item in the cart
        $cartItemIndex = collect($cartData)->search(function ($item) use ($productId) {
            return $item['product_id'] == $productId;
        });

        if ($cartItemIndex !== false) {
            // If the item is found, update the quantity
            $cartData[$cartItemIndex]['quantity'] = $newQuantity;

            // Store cart data in Redis
            Cache::put('user_cart:' . auth()->id(), $cartData, 60 * 60);

            return true;
        }

        return false;
    }

    /**
     * Delete the cart
     */
    public function delete()
    {
        // Logic to delete item from the cart
        $cartData = Cache::get('user_cart:' . auth()->id()) ?? [];

        if (!empty($cartData)) {
            Cache::forget('user_cart:' . auth()->id());
            return true;
        }
        return false;
    }
}