<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'tracking_id',
        'customer_name',
        'shipping_address',
        'city',
        'phone',
        'receipt_image',    //receipt image
        'receipt_accepted', //payment accepted
        'receipt_note',     //if rejected
        'shipped_at',
        'shipment_note',
    ];

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function amount()
    {
        $amount = 0;
        foreach ($this->order_details as $order_detail) {
            $amount += ($order_detail->qty * $order_detail->product->price);
        }
        return $amount;
    }
    public function status()
    {
        if ($this->receipt == null) {
            return 'Receipt not uploaded';
        } elseif ($this->receipt_accepted == null) {
            return "Payment verification";
        } elseif ($this->receipt_accepted == true) {
            if ($this->shipped_at == null)
                return "Shipment ready";
            else
                return "Shipment sent at " . $this->shipped_at;
        } else {
            return "Payment issue!";
        }
    }

    public function scopeReceiptUploaded($query)
    {
        return $query->whereNotNull('image');
    }
    public function scopePaymentVerified($query)
    {
        return $query->where('payment_verified', true);
    }
    public function payment_not_verified($query)
    {
        return $query->where('payment_verified', false);
    }
    public function scopePending($query)
    {
        return $query->whereNull('shipped_at');
    }
    public function shipped($query)
    {
        return $query->whereNotNull('shipped_at');
    }
}
