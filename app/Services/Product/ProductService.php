<?php

namespace App\Services\Product;

use App\Repositories\Product\ProductRepository;
use App\Services\Service;

class ProductService extends Service
{
    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

}
