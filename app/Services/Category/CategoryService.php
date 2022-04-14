<?php

namespace App\Services\Category;

use App\Repositories\Category\CategoryRepository;
use App\Services\Service;

class CategoryService extends Service
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

}
