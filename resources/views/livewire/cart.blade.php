<div>
    <div class="p-4">
        <h2 class="text-2xl font-bold mb-4">Store</h2>
    
        @foreach($cart as $id => $item)
            <div class="flex justify-between items-center bg-gray-100 p-4 mb-2 rounded">
                <div>
                    <p class="font-semibold">{{ $item['name'] }}</p>
                    <p>₱{{ $item['price'] }}</p>
                </div>
                <div class="flex items-center gap-2">
    <button wire:click="updateQuantity({{ $id }}, 'dec')" class="px-2 py-1 border rounded">-</button>
    <span>{{ $item['quantity'] }}</span>
    <button wire:click="updateQuantity({{ $id }}, 'inc')" class="px-2 py-1 border rounded">+</button>
</div>
                <button wire:click="removeItem({{ $id }})" class="text-red-500">Remove</button>
            </div>
        @endforeach
    
        <a href="{{ route('checkout') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Proceed to Checkout</a>
    </div>    
</div>