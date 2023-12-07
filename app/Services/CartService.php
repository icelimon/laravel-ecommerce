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
        if(isset($cartData['total_price'])) {
            unset($cartData['total_price']);
        }
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
        $totalPrice = 0;
        foreach ($cartData as $cartItem) {
            $totalPrice += $cartItem['quantity'] * $cartItem['unit_price'];
        }
        $cartData['total_price'] = $totalPrice;

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
        if(isset($cartData['total_price'])) {
            unset($cartData['total_price']);
        }
        $productId = $data['product_id'];
        $newQuantity = $data['quantity'];

        // Find the item in the cart
        $cartItemIndex = collect($cartData)->search(function ($item) use ($productId) {
            return $item['product_id'] == $productId;
        });

        if ($cartItemIndex !== false) {
            // If the item is found, update the quantity
            $cartData[$cartItemIndex]['quantity'] = $newQuantity;
            $cartData[$cartItemIndex]['unit_price'] = $data['unit_price'];
            $totalPrice = 0;
            foreach($cartData as $cartItem) {
                $totalPrice += $cartItem['quantity'] * $cartItem['unit_price'];
            }
            $cartData['total_price'] = $totalPrice;
            // Store cart data in Redis
            $expirationInSeconds = 60 * 60; // Example: Set expiration to 1 hour
            Cache::put('user_cart:' . auth()->id(), $cartData, $expirationInSeconds);

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