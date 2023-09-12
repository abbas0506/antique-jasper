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
        'image', //receipt image
        'payment_verified',
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
    public function status()
    {
        if ($this->image == null) {
            return 'Not Paid'; //not paid
        } else {
            if ($this->shipped_at == null)
                return "Waiting for shipment"; //paid, but not shipped
            else
                return "shipped"; //shipped
        }
    }

    public function receipt_uploaded($query)
    {
        return $query->whereNotNull('image');
    }
    public function payment_verified($query)
    {
        return $query->where('payment_verified', true);
    }
    public function payment_not_verified($query)
    {
        return $query->where('payment_verified', false);
    }
    public function pending($query)
    {
        return $query->whereNull('shipped_at');
    }
    public function shipped($query)
    {
        return $query->whereNotNull('shipped_at');
    }
}
