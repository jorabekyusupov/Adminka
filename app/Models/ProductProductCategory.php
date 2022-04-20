<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductProductCategory extends Model
{
    protected $fillable = [
        'product_id',
        'product_category_id',
    ];
}
