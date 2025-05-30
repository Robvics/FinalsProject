<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Supplier;


#[Layout( 'layouts.app')]   
#[Title( 'Home')]
class Home extends Component
{

    public $search;

    public function render()
    {
        $products = Supplier::join('products','products.supplier_id','suppliers.id')
        ->select(
            'products.*',
            'suppliers.name as supplier_name'
        )
        ->when($this->search, function($query){
            return $query->search(trim($this->search));
        })
        ->get();

        return view('livewire.home',[
            'products' => $products
        ]);
    }

    public function addToCart($id)
{
    $product = \App\Models\Products::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1
        ];
    }

    session()->put('cart', $cart);

    $this->dispatch('cartUpdated'); // optional: to notify other components
    session()->flash('message', $product->name . ' added to cart!');
}
}