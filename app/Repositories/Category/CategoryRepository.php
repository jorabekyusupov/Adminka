<?php

namespace App\Repositories\Category;

use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\ViewCategory;
use App\Repositories\Repository;

class CategoryRepository extends Repository
{
    public function __construct(Category $category, CategoryTranslation $categoryTranslation, ViewCategory $viewCategory)
    {
        $this->model = $category;
        $this->modelTranslation = $categoryTranslation;
        $this->modelView = $viewCategory;
    }


}
