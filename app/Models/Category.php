<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [ 'parent_id'];

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class, 'object_id', 'id');
    }
}
