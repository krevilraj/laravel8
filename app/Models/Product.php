<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'short_description', 'description', 'shipping_policy', 'sku', 'quantity', 'material', 'image', 'size_chart'
    ];

    public function scopeActive($query){
        return $query->where('status',true)->get();
    }
}
