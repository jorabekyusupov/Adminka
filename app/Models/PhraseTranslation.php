<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhraseTranslation extends Model
{
    protected $fillable = [
        'object_id',
        'translation',
        'language_code'
    ];

    public function phrase()
    {
        return $this->belongsTo(Phrase::class,  'object_id', 'id' );
    }

    public function language()
    {
        return $this->hasOne(Language::class, 'code', 'language_code');
    }
}
