<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'product_id',
        'description',
        'price',
        'image',
        'color',
        'height_cm',
        'width_cm',
        'depth_cm',
        'weight_gr',
        'quantity',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
