<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]


class Checkout extends Component
{
    public $full_address, $mobile_number, $payment_mode;
    public $cart = [];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function submitOrder()
    {
        $this->validate([
            'full_address' => 'required|string|max:255',
            'mobile_number' => 'required|numeric',
            'payment_mode' => 'required|in:Cash on Delivery,Credit Card',
        ]);

        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Order::create ([
            'address' => $this->full_address,
            'contact_number' => $this->mobile_number,
            'payment_mode' => $this->payment_mode,
            'total_amount' => $total,
        ]);

        foreach ($this->cart as $productId => $item) {
                OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }

        session()->forget('cart');
        session()->flash('success', 'Order placed successfully!');

        return redirect()->route('orders');
    }

    public function render()
    {
        return view('livewire.checkout');
    }
}