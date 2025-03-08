<x-layout>
    <x-slot:pageTitle>Dashboard</x-slot:pageTitle>

    <div class="max-w-7xl mx-auto py-12 px-6">
        <h1 class="text-4xl font-bold text-teal-600">Welcome, {{ auth()->user()->firstname }}!</h1>
        <p class="mt-2 text-lg text-neutral-700">Manage your account and orders here.</p>

        <!-- User Info Section -->
        <div class="mt-6 bg-white shadow-md p-6">
            <h2 class="text-2xl font-semibold text-neutral-800">Your Information</h2>
            <p class="text-neutral-600 mt-2"><strong>Full Name:</strong> {{ auth()->user()->firstname . " " . auth()->user()->lastname }}</p>
            <p class="text-neutral-600"><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p class="text-neutral-600"><strong>Joined on:</strong> {{ auth()->user()->created_at->format('F d, Y') }}</p>
        </div>

        <!-- Navigation Buttons -->
        <div class="mt-6 flex gap-4">
            <a href="/orders" class="bg-teal-500 text-white px-6 py-2 hover:bg-teal-600 transition">View Orders</a>
            <a href="/cart" class="bg-teal-500 text-white px-6 py-2 hover:bg-teal-600 transition">Go to Cart</a>
            <a href="/profile" class="bg-neutral-500 text-white px-6 py-2 hover:bg-neutral-600 transition">Edit Profile</a>
        </div>

        <!-- Recent Orders Section -->
        <div class="mt-10 bg-neutral-100 shadow-md p-6">
            <h2 class="text-2xl font-semibold text-neutral-800">Recent Orders</h2>

            @if($orders->isEmpty())
                <p class="mt-2 text-neutral-600">You have no recent orders.</p>
            @else
                <ul class="mt-4 space-y-4">
                    @foreach($orders as $order)
                        <li class="p-4 bg-white shadow">
                            <p><strong>Order #{{ $order->id }}</strong></p>
                            <p class="text-neutral-600">Total: ${{ $order->total_price }}</p>
                            <p class="text-neutral-500 text-sm">Placed on: {{ $order->created_at->format('F d, Y') }}</p>
                            <a href="/orders/{{ $order->id }}" class="text-teal-600 font-semibold">View Details</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-layout>
