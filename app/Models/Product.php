<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'product_category_id',
        'name',
        'size',
        'price',
        'image_url',
        'desc',
        'price',
    ];

    public function productCategory(){
        return $this->belongsTo('App\Models\ProductCategory');
    }
}
