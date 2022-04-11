<?php

namespace App\Repositories\Phrase;

use App\Models\Phrase;
use App\Models\PhraseTranslation;
use App\Models\ViewPhrase;
use App\Repositories\Repository;

class PhraseRepository extends Repository
{

    public function __construct(Phrase $phrase, PhraseTranslation $phraseTranslation, ViewPhrase $viewPhrase)
    {
        $this->model = $phrase;
        $this->modelTranslation = $phraseTranslation;
        $this->modelView = $viewPhrase;
    }

}
