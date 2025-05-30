<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout( 'layouts.app')]   
#[Title( 'Cart')]

class Cart extends Component
{
    public $cart = [];
    public $showCheckout = false;
    public $address;
    public $mobile;
    public $payment_mode = 'cod';

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function increase($id)
    {
        $this->cart[$id]['quantity']+1;
        session()->put('cart', $this->cart);
    }

    public function decrease($id)
    {
        if ($this->cart[$id]['quantity'] > 1) {
            $this->cart[$id]['quantity']--;
            session()->put('cart', $this->cart);
        }
    }

    public function remove($id)
    {
        unset($this->cart[$id]);
        session()->put('cart', $this->cart);
    }

    public function getTotal()
    {
        return collect($this->cart)->sum(fn($item) => $item['price'] * $item['quantity']);
    }

    public function toggleCheckout()
    {
        $this->showCheckout = !$this->showCheckout;
    }

    public function placeOrder()
    {
        $this->validate([
            'address' => 'required|min:10',
            'mobile' => 'required|min:10',
            'payment_mode' => 'required|in:cod,card',
        ]);

        session()->forget('cart');
        $this->cart = [];
        $this->showCheckout = false;
        session()->flash('message', 'Order placed successfully!');
    }

    public function updateQuantity($id, $action)
{
    if (!isset($this->cart[$id])) return;

    // Ensure the value is treated as an integer
    $qty = (int) $this->cart[$id]['quantity'];

    if ($action === 'inc') {
        $this->cart[$id]['quantity'] = $qty + 1;
    } elseif ($action === 'dec' && $qty > 1) {
        $this->cart[$id]['quantity'] = $qty - 1;
    }

    session()->put('cart', $this->cart);
}

public function removeItem($id)
{
    unset($this->cart[$id]);
    session()->put('cart', $this->cart);
}


    public function render()
    {
        return view('livewire.cart');
    }
}