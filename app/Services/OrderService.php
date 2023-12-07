<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;

class OrderService 
{
    /**
     * Find all
     */
    public function all()
    {
        return Order::with('orderDetails')->paginate();
    }
    /**
     * Add new order
     */
    public function add($data)
    {
        $orderData = $this->_prepare($data);
        $order = $orderData['order'];
        $details = $orderData['details'];
        try{
            DB::beginTransaction();
            $insertedId = Order::insertGetId($order);
            foreach ($details as $index => $detail) {
                $details[$index]['order_id'] = $insertedId;
            }
            OrderDetails::insert($details);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
       
        return false;
    }

    /**
     * Update existing order
     */
    public function edit($order, $data)
    {
        $orderData = $this->_prepare($data);
        $updateData = $orderData['order'];
        $details = $orderData['details'];
        try{
            DB::beginTransaction();
            $order->update($updateData);
            foreach ($details as $index => $detail) {
                $details[$index]['order_id'] = $order->id;
            }
            OrderDetails::where('order_id', $order->id)->delete();
            OrderDetails::insert($details);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return false;
    }

    /**
     * Delete the order
     */
    public function delete($order)
    {
        try{
            DB::beginTransaction();
            $order->delete();
            OrderDetails::where('order_id', $order->id)->delete();
            DB::commit();
            return true;
        } catch(\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        return false;
    }

    /**
     * Prepare the order and order details
     */
    private function _prepare($data)
    {
        $data['user_id'] = auth()->id();
        $details = $data['details'];
        unset($data['details']);
        $amount = 0;
        foreach ($details as $detail) {
            $amount += ($detail['quantity'] * $detail['unit_price']);
        }
        $data['amount'] = $amount;
        return ['order' => $data, 'details' => $details];
    }
}