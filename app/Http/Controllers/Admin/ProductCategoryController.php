<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductCategoryCreateRequest;
use App\Http\Requests\Admin\Product\ProductCategoryUpdateRequest;
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
    public function index(Request $request)
    {
        $query = ProductCategory::query();

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike('name', $request->keyword);
        }

        $product_categories = $query->latest()->paginate(20)->withQueryString();

        return inertia('Admin/ProductCategory/Index', [
            'product_categories' => $product_categories,
            'filter' => $request,
        ]);
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
