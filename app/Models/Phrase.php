<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    protected $fillable = [
        'page_id',
        'word'
    ];




    public function translation()
    {
        return $this->hasOne(PhraseTranslation::class, 'object_id', 'id');
    }
    public function translations()
    {
        return $this->hasMany(PhraseTranslation::class, 'object_id', 'id');
    }

    public function page()
    {
        return $this->hasOne(Page::class,  'id','page_id');
    }
}
