<?php

namespace App\Repositories\ProductCategory;

use App\Models\ProductCategory;
use App\Models\ProductCategoryTranslation;
use App\Models\ViewProductCategory;
use App\Repositories\Repository;

class ProductCategoryRepository extends Repository
{
    public function __construct(ProductCategory $productCategory,ProductCategoryTranslation $productCategoryTranslation, ViewProductCategory $viewProductCategory)
    {
        $this->model = $productCategory;
        $this->modelTranslation = $productCategoryTranslation;
        $this->modelView =  $viewProductCategory;
    }

}
