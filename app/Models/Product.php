<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Const
    public const STATUS_ACTIVE    = 1;
    public const STATUS_INACTIVE  = 0;

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function product_stocks()
    {
        return $this->hasMany(ProductSizeStock::class);
    }
}
