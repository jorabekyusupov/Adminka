<?php

namespace App\Services\ProductProductCategory;

use App\Repositories\ProductProductCategory\ProductProductCategoryRepository;
use App\Services\Service;

class ProductProductCategoryService extends Service
{
    public function __construct(ProductProductCategoryRepository $productProductCategoryRepository)
    {
        $this->repository = $productProductCategoryRepository;
    }

}
