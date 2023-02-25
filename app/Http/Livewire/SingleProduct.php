<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class SingleProduct extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.single-product');
    }

    public function addToCart(Product $product){
        try {
            \Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->selling_price,
                'quantity' => 1,
                'attributes' => array(
                    'price' => $product->price,
                    'image' => asset($product->image),
                ),
                'associatedModel' => $product
            ]);

            $this->emit('cart_updated');
            $this->dispatchBrowserEvent('alert',[
                'type' => 'success',
                'message' => 'Product added to cart'
            ]);
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('alert',[
                'type' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
