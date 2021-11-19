<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    protected $fillable = [
        'product_list_id', 'name', 'phone_number', 'status','order_time','approved_at','quantity'
    ];

    public function productList()
    {
        return $this->belongsTo(ProductList::class, 'product_list_id', 'id');
    }
}
