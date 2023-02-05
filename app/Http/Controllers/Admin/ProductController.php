<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Services\Admin\Product\CreateProductService;
use App\Services\Admin\Product\UpdateProductService;
use App\Http\Requests\Admin\Product\ProductCreateRequest;
use App\Http\Requests\Admin\Product\ProductUpdateRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $all_products = Product::all();
        $product_categories = ProductCategory::latest()->get(['id','name','slug']);
        $products_query = Product::query();

        $products = $products_query->with(['productCategory:id,name'])
            ->when($request->keyword, function ($query, $keyword) {
                $query->whereLike(['name'],  $keyword);
            })
            ->when($request->type, function ($query, $type) {
                if ($type != 'all') {
                    $query->where('type', $type);
                }
            })
            ->when($request->product_category, function ($query, $product_category) {
                $query->where('product_category_id', $product_category);
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return inertia('Admin/Product/Index', [
            'products' => $products,
            'product_categories' => $product_categories,
            'filter' => $request,
            'count_request' => [
                'all' => $all_products->count() ?? 0,
                'medicine' => $all_products->where('type', 'medicine')->count() ?? 0,
                'others' => $all_products->where('type', 'others')->count() ?? 0,
            ]
        ]);

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  ProductCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        (new CreateProductService())->execute($request);

        $this->flashSuccess('Product created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        (new UpdateProductService())->execute($request, $product);

        $this->flashSuccess('Product updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        $this->flashSuccess('Product deleted successfully');
        return back();
    }
}
