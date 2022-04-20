<?php

namespace App\Services\ProductCategory;

use App\Repositories\ProductCategory\ProductCategoryRepository;
use App\Services\Service;

class ProductCategoryService extends Service
{
    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        $this->repository = $productCategoryRepository;
    }

}
