<?php

namespace App\Http\Controllers;

use App\Services\ProductBrand\ProductBrandService;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{
    public function __construct(ProductBrandService $productBrandService)
    {
        $this->service = $productBrandService;
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
