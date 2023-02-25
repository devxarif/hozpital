<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ProductCategory;
use App\Models\Product;

class Shop extends Component
{
    public $search, $categories;

    public function render()
    {
        $data['product_categories'] = ProductCategory::select('id','name')->get();
        $data['products'] = Product::whereLike('name', $this->search ?? '')
                ->when($this->categories, function($query, $categories){
                    return $query->whereIn('product_category_id', $categories);
                })
                ->with('productCategory:id,name')
                ->paginate(15);

        return view('livewire.shop', $data);
    }

    public function updatedCategories(){
        if (!is_array($this->categories)) return;
        $this->categories = array_filter($this->categories,
            function($category){
                return $category != false;
            }
        );
    }
}
