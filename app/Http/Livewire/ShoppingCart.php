<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShoppingCart extends Component
{
    public function render()
    {
        $cart_items = \Cart::getContent();
        $subtotal = \Cart::getSubTotal();

        return view('livewire.shopping-cart', compact('cart_items','subtotal'));
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
