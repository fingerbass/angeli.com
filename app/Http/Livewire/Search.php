<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $open = false;

    public function updatedSearch($value)
    {
        $this->open = (bool)$value;
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::where('name', 'LIKE', "%" . $this->search . "%")
                ->where('status', Product::PUBLICADO)
                ->take(8)
                ->get();
        } else {
            $products = [];
        }

        return view('livewire.search', compact('products'));
    }
}
