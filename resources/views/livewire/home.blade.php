<div class="p-8 w-full">

    <div class="mb-4">
        <label class="block text-lg font-semibold mb-2">Search Student</label>
        <input 
            class="w-full bg-gray-100 py-2 px-4 rounded-md border border-gray-300 focus:outline-none focus:ring focus:ring-green-300" 
            type="text" 
            placeholder="Type product name..." 
            wire:model.live='search'>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($products as $product)
            <div class="rounded-lg border border-gray-300 bg-green-100 drop-shadow-lg overflow-hidden">
                <img src="{{ asset('uploads/product-images/' . $product->file_path) }}" class="w-full h-48 object-cover" alt="{{ $product->name }}">

                <div class="p-4">
                    <p class="text-xl font-bold mb-2">{{ $product->name }}</p>
                    <p class="text-sm text-gray-700 mb-1">School Year: {{ $product->price }}</p>
                    <p class="text-sm text-gray-700 mb-1">Course: {{ $product->category }}</p>
                    <p class="text-sm text-gray-700 mb-3">Age: {{ $product->quantity }}</p>

                    <button 
                        wire:click='addToCart({{ $product->id }})'
                        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition duration-200">
                         Export
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center text-gray-500">
                No products found.
            </div>
        @endforelse
    </div>
    
</div>
