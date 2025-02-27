<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['total_price'];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'sale_items')
            ->withPivot('quantity', 'subtotal');
    }
    public function items()
{
    return $this->hasMany(SaleItem::class);
}
}
