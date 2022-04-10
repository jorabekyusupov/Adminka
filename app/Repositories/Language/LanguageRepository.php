<?php

namespace App\Repositories\Language;
use App\Models\Language;
use App\Repositories\Repository;

class LanguageRepository extends Repository
{

    public function __construct(Language $language)
    {
        $this->model = $language;
    }

}
