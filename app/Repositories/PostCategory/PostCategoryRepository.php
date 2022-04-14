<?php

namespace App\Repositories\PostCategory;

use App\Models\PostCategory;
use App\Repositories\Repository;

class PostCategoryRepository extends Repository
{
    public function __construct(PostCategory $postCategory)
    {
        $this->model = $postCategory;
    }

}
