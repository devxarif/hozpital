<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductCategoryCreateRequest;
use App\Http\Requests\Admin\Product\ProductCategoryUpdateRequest;
use App\Services\Admin\ProductCategory\CreateProductCategoryService;
use App\Services\Admin\ProductCategory\UpdateProductCategoryService;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCategoryCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryCreateRequest $request)
    {
        (new CreateProductCategoryService())->execute($request);

        $this->flashSuccess('Product Category created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $ProductCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $ProductCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductCategoryUpdateRequest $request
     * @param  ProductCategory $ProductCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryUpdateRequest $request, ProductCategory $ProductCategory)
    {
        (new UpdateProductCategoryService())->execute($request, $ProductCategory);

        $this->flashSuccess('Product Category updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductCategory $ProductCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $ProductCategory)
    {
        $ProductCategory->delete();

        $this->flashSuccess('Product Category deleted successfully');
        return back();
    }
}
