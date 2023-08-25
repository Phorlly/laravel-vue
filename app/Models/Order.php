<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['order_at', 'table_id', 'user_id', 'customer_id', 'total_pay', 'cash_in'];

public function product()
    {
        return $this->belongsToMany(Product::class, 'product_orders', 'order_id', 'product_id');
    }
}