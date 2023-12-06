<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Traits\ResponseTrait;
use App\Models\Cart;
use App\Services\CartService;

class CartController extends Controller
{
    use ResponseTrait;

    protected $cartService;

    public function __construct(CartService $cartService) 
    {
        $this->cartService = $cartService;
    }
    /**
     * Display a listing of the cart.
     */
    public function index()
    {
        $carts = $this->cartService->all();
        return $this->commonResponse($carts);
    }


    /**
     * Store a newly created cart in storage.
     */
    public function store(StoreCartRequest $request)
    {
        $cart = $request->all();
        $created = $this->cartService->add($cart);
        if($created) {
            return $this->commonResponse(null, 'Successfully created', true);
        } else {
            return $this->commonResponse(null, 'Failed to create', false);
        }
    }

    /**
     * Update the specified cart in storage.
     */
    public function update(UpdateCartRequest $request)
    {
        $status = $this->cartService->edit($request->all());
        if ($status) {
            return $this->commonResponse(null, "Successfully updated", true);
        } else {
            return $this->commonResponse(null, 'Failed to update', false);
        }
    }

    /**
     * Remove the specified cart from storage.
     */
    public function destroy()
    {
        $status = $this->cartService->delete();
        if($status) {
            return $this->commonResponse(null, 'Deleted successfully', true);
        } else {
            return $this->commonResponse(null, 'Failed to Delete', false);
        }
    }
}
