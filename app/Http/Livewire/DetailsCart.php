<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DetailsCart extends Component
{
    public $product, $quantity = 1;

    public function render()
    {
        return view('livewire.details-cart');
    }

    public function addToCart(){
        try {
            \Cart::add([
                'id' => $this->product->id,
                'name' => $this->product->name,
                'price' => $this->product->selling_price,
                'quantity' => $this->quantity,
                'attributes' => array(
                    'price' => $this->product->price,
                    'image' => asset($this->product->image),
                ),
                'associatedModel' => $this->product
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
