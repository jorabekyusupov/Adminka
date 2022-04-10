<?php

namespace App\Services\PagePhrase;

use App\Repositories\PagePhrase\PagePhraseRepository;
use App\Services\Service;

class PagePhraseService extends Service
{
    public function __construct(PagePhraseRepository $pagePhraseRepository)
    {
        $this->repository = $pagePhraseRepository;
    }


}
