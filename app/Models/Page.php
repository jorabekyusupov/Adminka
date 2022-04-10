<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $fillable = [
        'name',
        'module_id',
        'page_link',
        'page_icon'
    ];

    public function phrase()
    {
        return $this->hasMany(Phrase::class, 'page_id', 'id');
    }

}
