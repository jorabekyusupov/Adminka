<?php

namespace App\Services\Phrase;

use App\Repositories\Phrase\PhraseRepository;
use App\Services\Service;

class PhraseService extends Service
{
    public function __construct(PhraseRepository $phraseRepository)
    {
        $this->repository = $phraseRepository;
    }


}
