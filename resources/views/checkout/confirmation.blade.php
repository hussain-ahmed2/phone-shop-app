<x-layout>
    <x-slot:pageTitle>Order Confirmation</x-slot:pageTitle>

    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4">Order Confirmation</h1>
        
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p>Thank you for your order! Your order has been placed successfully.</p>
            <h2 class="text-xl mt-4">Order Details</h2>
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

            <h3 class="text-lg mt-4">Items:</h3>
            <ul>
                @foreach ($order->items as $item)
                    <li>
                        {{ $item->phone->name }} - {{ $item->quantity }} x ${{ number_format($item->price, 2) }}
                    </li>
                @endforeach
            </ul>

            <div class="mt-6">
                <a href="/" class="bg-teal-600 text-white px-6 py-3 hover:bg-teal-500">Go to Home</a>
            </div>
        </div>
    </div>
</x-layout>
