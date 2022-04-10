<?php

namespace App\Repositories\Phrase;

use App\Models\Phrase;
use App\Models\PhraseTranslation;
use App\Repositories\Repository;

class PhraseRepository extends Repository
{
    public function __construct(Phrase $phrase, PhraseTranslation $phraseTranslation)
    {
        $this->model = $phrase;
        $this->modelTranslation = $phraseTranslation;
    }

}
