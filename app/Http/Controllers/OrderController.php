<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Traits\ResponseTrait;
use App\Models\Order;
use App\Services\OrderService;

class OrderController extends Controller
{

    use ResponseTrait;

    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }
    /**
     * Display a listing of the order.
     */
    public function index()
    {
        $orders = $this->orderService->all();
        return $this->commonResponse($orders);
    }

    /**
     * Show the form for creating a new order.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = $request->all();
        $created = $this->orderService->add($order);
        if($created) {
            return $this->commonResponse(null, 'Successfully created');
        } else {
            return $this->commonResponse(null, 'Failed to create', false);
        }
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        $completeOrder = Order::with('orderDetails')->where('id', $order->id)->first();
        return $this->commonResponse($completeOrder);
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order)
    {
        return $this->commonResponse($order);
    }

    /**
     * Update the specified order in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $status = $this->orderService->edit($order, $request->all());
        if ($status) {
            return $this->commonResponse($order, 'Successfully updated');
        } else {
            return $this->commonResponse($order, 'Failed to update', false);
        }
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order)
    {
        $status = $this->orderService->delete($order);
        if($status) {
            return $this->commonResponse(null, 'Deleted successfully');
        } else {
            return $this->commonResponse(null, 'Failed to Delete', false);
        }
    }
}
