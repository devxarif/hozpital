<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $cart_count = \Cart::getTotalQuantity();
        $cart_items = \Cart::getContent();

        return view('livewire.cart-counter', compact('cart_count','cart_items'));
    }

    public function removeFromCart($id){
        try {
            \Cart::remove($id);

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('alert',[
                'type' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
