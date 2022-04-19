<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewPost extends Model
{
    protected $table = 'view_posts';

    public function categories()
    {
        return $this->belongsToMany(ViewCategory::class, 'post_categories', 'post_id', 'category_id');
    }

    public function files()
    {
        return $this->hasMany(File::class,'object_id','id')->where('object_type', 'posts');
    }
}

