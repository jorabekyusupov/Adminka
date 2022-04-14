<?php

namespace App\Services\PostCategory;

use App\Repositories\PostCategory\PostCategoryRepository;
use App\Services\Service;

class PostCategoryService extends Service
{
    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->repository = $postCategoryRepository;
    }

}
