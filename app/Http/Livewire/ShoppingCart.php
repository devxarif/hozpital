<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShoppingCart extends Component
{
    public function render()
    {
        $cartCollection = \Cart::getContent();
        $cart_items = $cartCollection->sort();
        $subtotal = \Cart::getSubTotal();

        return view('livewire.shopping-cart', compact('cart_items','subtotal'));
    }

    public function removeFromCart($id){
        try {
            \Cart::remove($id);

            $this->emit('cart_updated');

        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('alert',[
                'type' => 'error',
                'message' => $th->getMessage()
            ]);
        }
    }

    public function incrementQty($id){
        \Cart::update($id, array(
            'quantity' => array(
                'relative' => true,
                'value' => 1
            )
        ));

        $this->emit('cart_updated');
    }

    public function decrementQty($id){
        \Cart::update($id, array(
            'quantity' => array(
                'relative' => true,
                'value' => -1
            )
        ));

        $this->emit('cart_updated');
    }
}
