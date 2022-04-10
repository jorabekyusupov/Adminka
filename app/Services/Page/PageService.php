<?php

namespace App\Services\Page;

use App\Repositories\Page\PageRepository;
use App\Services\Service;

class PageService extends Service
{
    public function __construct(PageRepository $pageRepository)
    {
        $this->repository = $pageRepository;
    }


}
