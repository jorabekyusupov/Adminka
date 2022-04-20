<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\ViewProduct;
use App\Repositories\Repository;

class ProductRepository extends Repository
{
    public function __construct(Product $product,ProductTranslation $productTranslation,ViewProduct $viewProduct)
    {
        $this->model = $product;
        $this->modelTranslation = $productTranslation;
        $this->modelView = $viewProduct;
    }

}
