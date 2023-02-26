<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SingleCart extends Component
{
    public $item = [], $quantity = 0;

    // public function mount()
    // {
    //     $this->quantity = $this->item->quantity;
    // }

    public function render()
    {
        return view('livewire.single-cart');
    }

    // public function updatedQuantity($value){
    //     $this->quantity = $value;
    //     info($value);
    //     // dd($value);
    // }
}
