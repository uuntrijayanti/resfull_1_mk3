<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'product_id', 'quantity', 'total_price'];

    public function order()
    {
        return $this->belongsTo(Product::class);
    }    

}
