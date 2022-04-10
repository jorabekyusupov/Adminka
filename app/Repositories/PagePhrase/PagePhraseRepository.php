<?php

namespace App\Repositories\PagePhrase;

use App\Models\PagePhrase;
use App\Repositories\Repository;

class PagePhraseRepository extends Repository
{
    public function __construct(PagePhrase $pagePhrase)
    {
        $this->model = $pagePhrase;
    }
}
