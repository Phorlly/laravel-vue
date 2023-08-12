<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'name_kh', 'price', 'photo', 'category_id', "noted"];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
