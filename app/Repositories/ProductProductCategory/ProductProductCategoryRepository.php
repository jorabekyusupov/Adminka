<?php

namespace App\Repositories\ProductProductCategory;

use App\Models\ProductProductCategory;
use App\Repositories\Repository;

class ProductProductCategoryRepository extends Repository
{
        public function __construct(ProductProductCategory $productProductCategory)
        {
            $this->model = $productProductCategory;
        }


}
