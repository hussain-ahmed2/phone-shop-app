<x-layout>
    <x-slot:pageTitle>Checkout</x-slot:pageTitle>

    <div class="max-w-4xl mx-auto bg-white shadow-md p-6 my-14">
        <h2 class="text-2xl font-bold mb-4">Checkout</h2>

        @foreach ($cartItems as $cartItem)
            <div class="flex justify-between border-b py-2">
                <div>{{ $cartItem->phone->name }} (x{{ $cartItem->quantity }})</div>
                <div>${{ number_format($cartItem->phone->price * $cartItem->quantity, 2) }}</div>
            </div>
        @endforeach

        <div class="flex justify-between mt-4 font-bold">
            <span>Total:</span>
            <span>${{ number_format($total, 2) }}</span>
        </div>

        <form action="/checkout" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="bg-teal-600 text-white px-6 py-3 hover:bg-teal-500 w-full">
                Place Order
            </button>
        </form>
    </div>
</x-layout>
