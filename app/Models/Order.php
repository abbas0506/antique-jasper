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
        'image',
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
    public function status()
    {
        if ($this->image == null) {
            return 0; //not paid
        } else {
            if ($this->shipped_at == null)
                return 1; //paid, but not shipped
            else
                return 2; //shipped
        }
    }
}
