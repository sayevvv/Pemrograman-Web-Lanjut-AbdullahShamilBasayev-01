<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'price', 'stock'];

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function sales() {
        return $this->belongsToMany(Sale::class, 'sale_items')
        ->withPivot('quantity', 'subtotal');
    }
}
