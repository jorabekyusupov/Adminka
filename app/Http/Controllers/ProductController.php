<?php

namespace App\Http\Controllers;

use App\Services\Product\ProductService;
use App\Services\ProductCategory\ProductCategoryService;
use App\Services\ProductProductCategory\ProductProductCategoryService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected ProductProductCategoryService $RelProCatService;
    protected ProductCategoryService $productCategoryService;

    public function __construct(
        ProductService $productService,
        ProductProductCategoryService $productProductCategoryService,
        ProductCategoryService $productCategoryService)
    {
        $this->service = $productService;
        $this->RelProCatService = $productProductCategoryService;
        $this->productCategoryService = $productCategoryService;
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
