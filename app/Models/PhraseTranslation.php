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
}
