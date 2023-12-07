<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetails;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'status',
    ];

    // Define the one-to-many relationship with OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
