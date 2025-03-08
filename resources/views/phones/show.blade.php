<x-layout>
    <x-slot:pageTitle>{{ $phone->name }}</x-slot:pageTitle>

    <div class="max-w-7xl mx-auto py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Phone Image -->
            <div class="flex justify-center items-center">
                <img src="{{ asset('storage/' . $phone->image) }}" alt="{{ $phone->name }}"
                    class="w-full h-auto rounded-lg shadow-md">
            </div>

            <!-- Phone Details -->
            <div class="space-y-4">
                <h1 class="text-4xl font-bold">{{ $phone->name }}</h1>
                <p class="text-lg text-gray-600">Brand: {{ $phone->brand }}</p>
                <p class="text-xl text-teal-600 font-semibold">${{ number_format($phone->price, 2) }}</p>

                <p class="mt-4 text-lg">{{ $phone->description }}</p>

                <!-- Phone Specs -->
                @if ($phone->specs)
                    <div class="mt-6">
                        <h2 class="text-2xl font-semibold">Specifications:</h2>
                        <ul class="mt-4 space-y-2 text-lg">
                            @foreach (json_decode($phone->specs, true) as $key => $value)
                                <li><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Phone Stock -->
                <div class="mt-6">
                    <p class="text-lg font-semibold">Stock Available: {{ $phone->stock }}</p>
                </div>

                <!-- Add to Cart Button -->
                <div class="mt-6">
                    @if (!$isInCart)
                        <!-- Show the Add to Cart button if the phone is not in the cart -->
                        <form action="{{ route('cart.add', $phone) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="bg-teal-500 text-white px-6 py-2 hover:bg-teal-600 transition duration-300">
                                Add to Cart
                            </button>
                        </form>
                    @else
                        <!-- Optionally show a message that the phone is already in the cart -->
                        <button
                            class="bg-teal-500 text-white px-6 py-2 cursor-not-allowed opacity-50 transition duration-300"
                            disabled>
                            Already in Cart
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>
