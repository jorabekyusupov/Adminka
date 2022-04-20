<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryTranslation extends Model
{
    protected $fillable=['object_id', 'language_code', 'title', 'description'];
}
