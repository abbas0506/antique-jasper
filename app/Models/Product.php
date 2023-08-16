<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'price',
        'color',
        'gender',
        'image',
        'rating',
        'subcategory_id'
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function scopeColor($query, $color)
    {
        return $query->where('color', $color);
    }
    public function scopeGender($query, $gender)
    {
        return $query->where('gender', $gender);
    }
    public function scopePriceBetween($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }
}
