<?php

namespace App\Repositories\ProductBrand;

use App\Models\ProductBrand;
use App\Repositories\Repository;

class ProductBrandRepository extends Repository
{
    public function __construct(ProductBrand $productBrand)
    {
        $this->model = $productBrand;
    }


}
