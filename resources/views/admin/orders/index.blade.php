<x-layout>
    <x-slot:pageTitle>Admin - Manage Orders</x-slot:pageTitle>

    <div class="flex">
        <x-admin.sidebar />

        <div class="flex-1 p-6">
            <header class="flex items-center justify-between mb-8">
                <div class="text-xl font-bold text-neutral-800">Manage Orders</div>
                <a href="/admin/orders/create" class="bg-teal-500 hover:bg-teal-600 text-white py-2 px-6">Create New Order</a>
            </header>

            <div class="bg-white p-6 shadow-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Order ID</th>
                            <th class="px-4 py-2">User</th>
                            <th class="px-4 py-2">Phone</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @foreach ($order->items as $item) <!-- Loop through the order items -->
                                <tr>
                                    <td class="border px-4 py-2">{{ $order->id }}</td>
                                    <td class="border px-4 py-2">{{ $order->user->firstname }} {{ $order->user->lastname }}</td>
                                    <td class="border px-4 py-2">{{ $item->phone->name }}</td>
                                    <td class="border px-4 py-2">{{ ucfirst($order->status) }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="/admin/orders/{{ $order->id }}/edit" class="text-teal-600">Edit</a>
                                        <!-- Add Delete Option here if necessary -->
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
