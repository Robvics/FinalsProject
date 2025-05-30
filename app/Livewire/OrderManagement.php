<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class OrderManagement extends Component
{
    public $search = '';

    public function render()
    {
        // Fetch orders based on search criteria
        $orders = Order::with('items')
            ->when($this->search, function ($query) {
                $query->where('id', 'like', '%' . $this->search . '%')
                      ->orWhere('address', 'like', '%' . $this->search . '%')
                      ->orWhere('contact_number', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.order-management', ['orders' => $orders]);
    }

    // Method to delete the order
    public function deleteOrder($orderId)
    {
        $order = Order::find($orderId);

        if ($order) {
            // Delete related order items
            $order->items()->delete();

            // Delete the order itself
            $order->delete();

            // Flash success message
            session()->flash('message', 'Order deleted successfully!');
        }

        // Refresh the order list
        $this->render();
    }
}
