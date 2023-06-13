<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Darryldecode\Cart\CartCondition;
use Livewire\Component;

class AddCartItem extends Component
{
    public $product, $quantity;
    public $qty = 1;

    public function mount()
    {
        $this->quantity = $this->product->quantity;
    }

    public function decrement()
    {
        --$this->qty;
    }

    public function increment()
    {
        ++$this->qty;
    }

    public function addItem()
    {
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
