<?php

namespace App\Http\Controllers;

use App\Services\ProductCategory\ProductCategoryService;
use Illuminate\Http\Request;

class ProductCategory extends Controller
{

    public function __construct(ProductCategoryService $productCategoryService)
    {
        $this->service = $productCategoryService;
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
