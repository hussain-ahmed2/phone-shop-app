<x-layout>
    <x-slot:pageTitle>Your Orders</x-slot:pageTitle>

    <div class="max-w-7xl mx-auto py-12 px-6">
        <h1 class="text-4xl font-bold text-teal-600">Your Orders</h1>

        @if($orders->isEmpty())
            <p class="mt-4 text-neutral-600">You haven't placed any orders yet.</p>
        @else
            <div class="mt-6 bg-white shadow-md p-6">
                <ul class="space-y-4">
                    @foreach($orders as $order)
                        <li class="p-4 bg-neutral-100 shadow">
                            <p><strong>Order #{{ $order->id }}</strong></p>
                            <p class="text-neutral-600">Total: ${{ number_format($order->total_price, 2) }}</p>
                            <p class="text-neutral-500 text-sm">Placed on: {{ $order->created_at->format('F d, Y') }}</p>
                            <a href="/orders/{{ $order->id }}" class="text-teal-600 font-semibold">View Details</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-6">
                {{ $orders->links() }}
            </div>
        @endif
    </div>
</x-layout>
