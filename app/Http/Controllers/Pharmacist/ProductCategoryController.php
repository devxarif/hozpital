<?php

namespace App\Http\Controllers\Pharmacist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductCategoryCreateRequest;
use App\Http\Requests\Admin\Product\ProductCategoryUpdateRequest;
use App\Models\ProductCategory;
use App\Services\Admin\ProductCategory\CreateProductCategoryService;
use App\Services\Admin\ProductCategory\DeleteProductCategoryService;
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
        $product_categories = ProductCategory::latest()->paginate(20);

        return inertia('Pharmacist/ProductCategory/Index', compact('product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryCreateRequest $request)
    {
        (new CreateProductCategoryService)->execute($request);

        $this->flashSuccess('Product Category created successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductCategory  $ProductCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryUpdateRequest $request, ProductCategory $productCategory)
    {
        (new UpdateProductCategoryService)->execute($request, $productCategory);

        $this->flashSuccess('Product Category updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ProductCategory  $ProductCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        (new DeleteProductCategoryService)->execute($productCategory);

        $this->flashSuccess('Product Category deleted successfully');

        return back();
    }
}
