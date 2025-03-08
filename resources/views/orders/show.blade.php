<x-layout>
    <x-slot:pageTitle>Order #{{ $order->id }}</x-slot:pageTitle>

    <div class="max-w-5xl mx-auto py-12 px-6">
        <h1 class="text-4xl font-bold text-teal-600">Order Details</h1>
        <p class="text-gray-500 mt-2">Order ID: #{{ $order->id }}</p>

        <div class="mt-6 bg-white shadow-md rounded-lg p-6">
            <p class="text-lg"><strong>Total Amount:</strong> ${{ number_format($order->total, 2) }}</p>
            <p class="text-gray-600"><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p class="text-gray-600"><strong>Placed on:</strong> {{ $order->created_at->format('F d, Y, h:i A') }}</p>
        </div>

        <div class="mt-8">
            <h2 class="text-2xl font-bold">Items</h2>
            <ul class="mt-4 space-y-4">
                @foreach ($order->items as $item)
                    <li class="p-4 bg-gray-100 shadow rounded-lg">
                        <p><strong>{{ $item->phone->name }}</strong></p>
                        <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                        <p class="text-gray-600">Price: ${{ number_format($item->price, 2) }}</p>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">
            <a href="/orders" class="text-teal-600 font-semibold">Back to Orders</a>
        </div>
    </div>
</x-layout>
