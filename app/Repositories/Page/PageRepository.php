<?php

namespace App\Repositories\Page;

use App\Models\Page;
use App\Repositories\Repository;

class PageRepository extends Repository
{
    public function __construct(Page  $page)
    {
        $this->model = $page;
    }
}
