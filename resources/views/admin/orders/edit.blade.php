<x-layout>
    <x-slot:pageTitle>Edit Order</x-slot:pageTitle>

    <div class="flex">
        <x-admin.sidebar />

        <div class="flex-1 p-6">
            <header class="flex items-center justify-between mb-8">
                <div class="text-xl font-bold text-neutral-800">Edit Order #{{ $order->id }}</div>
                <a href="/admin/orders" class="bg-teal-600 text-white py-2 px-4 rounded">Back to Orders</a>
            </header>

            <div class="bg-white p-6 shadow-lg">
                <form action="/admin/orders/{{ $order->id }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-neutral-700">Order Status</label>
                        <select name="status" id="status" class="p-2 border-2 border-neutral-400 block w-full mt-1" required>
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white py-2 px-6">Update Order</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
