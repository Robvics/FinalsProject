<div>
    <div class="p-8 max-w-2xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Checkout</h2>
    
        <form wire:submit.prevent="submitOrder" class="space-y-4">
            <div>
                <label>Full Address</label>
                <input type="text" wire:model="full_address" class="w-full border p-2 rounded" />
                @error('full_address') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
    
            <div>
                <label>Mobile Number</label>
                <input type="text" wire:model="mobile_number" class="w-full border p-2 rounded" />
                @error('mobile_number') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
    
            <div>
                <label>Payment Mode</label>
                <select wire:model="payment_mode" class="w-full border p-2 rounded">
                    <option value="">-- Select Payment --</option>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Credit Card">Credit Card</option>
                </select>
                @error('payment_mode') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
    
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Place Order</button>
        </form>
    </div>    
</div>