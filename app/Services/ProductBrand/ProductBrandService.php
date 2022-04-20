<?php

namespace App\Services\ProductBrand;

use App\Repositories\ProductBrand\ProductBrandRepository;
use App\Services\Service;

class ProductBrandService extends Service
{
    public function __construct(ProductBrandRepository $productBrandRepository)
    {
        $this->repository = $productBrandRepository;
    }

}
