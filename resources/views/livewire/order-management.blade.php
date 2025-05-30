<table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Address</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Total</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Created</th>
            <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Actions</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($orders as $order)
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $order->id }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $order->address }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">₱{{ number_format($order->total_amount, 2) }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $order->created_at->format('F j, Y g:i A') }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">
                <button wire:click="deleteOrder({{ $order->id }})" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                <button wire:click="viewOrderDetails({{ $order->id }})" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>