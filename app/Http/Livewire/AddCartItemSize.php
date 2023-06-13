<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;

class AddCartItemSize extends Component
{

    public $product, $sizes;
    public $qty = 1;
    public $quantity = 0;
    public $size_id = '';
    public $color_id = '';

    public $colors = [];
    public $viewStock = false;

    public function updatedSizeId($value)
    {
        $size = Size::find($value);
        $this->colors = $size->colors;
        $this->color_id = '';
        $this->viewStock = false;
    }

    public function updatedColorId($value)
    {
        $size = Size::find($this->size_id);
        $this->quantity = $size->colors->find($value)->pivot->quantity;
        $this->viewStock = true;
    }

    public function mount()
    {
        $this->sizes = $this->product->sizes;
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
