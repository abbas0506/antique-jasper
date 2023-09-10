<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'tracking_id',
        'first_name',
        'last_name',
        'address',
        'city',
        'phone',
        'courier',
        'shipped_at',
        'shipment_note',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function amount()
    {
        $amount = 0;
        foreach ($this->orderDetails as $orderDetail) {
            $amount += ($orderDetail->qty * $orderDetail->product->price);
        }
        return $amount;
    }
}
