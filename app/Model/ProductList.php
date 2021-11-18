<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    protected $fillable = [
        'product_category_id', 'product_name', 'uom', 'quantity'
    ];

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }
}
