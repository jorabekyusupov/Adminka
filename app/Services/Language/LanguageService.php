<?php

namespace App\Services\Language;

use App\Repositories\Language\LanguageRepository;
use App\Services\Service;

class LanguageService extends Service
{
    public function __construct(LanguageRepository $languageRepository)
    {
        $this->repository = $languageRepository;
    }

}
