<?php

namespace App\Models;
use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $fillable =[
        'category_name',
        'product_name',
        'product_price',
        'product_sort_description',
        'product_long_description',
        'product_code',
        'product_iamge',
        'product_quantity',
    ];
    public function relationtocategory()
    {
        return $this->hasOne(Category::class, 'id', 'category_name');
    }

}
