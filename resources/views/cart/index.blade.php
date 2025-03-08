<x-layout>
    <x-slot:pageTitle>Shopping Cart</x-slot:pageTitle>

    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Your Cart</h1>

        @if (count($cartItems) > 0)
            <div class="bg-white p-6 shadow-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 w-1/4">Product</th>
                            <th class="px-4 py-2 w-1/4">Quantity</th>
                            <th class="px-4 py-2 w-1/4">Price</th>
                            <th class="px-4 py-2 w-1/4">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr class="text-center">
                                <td class="border px-4 py-2">
                                    <div class="flex items-center gap-2 flex-wrap">
                                        <img src="{{ asset('storage/' . $item->phone->image) }}"
                                            alt="{{ $item->phone->name }}" class="w-10 h-10 object-fit">
                                        <p>{{ $item->phone->name }}</p>
                                    </div>
                                </td>
                                <td class="border px-4 py-2">
                                    <p>{{ $item->quantity }}</p>
                                </td>
                                <td class="border px-4 py-2">
                                    <p>{{ number_format($item->phone->price, 2) }}</p>
                                </td>
                                <td class="border px-4 py-2">
                                    <div class="flex gap-5 mx-auto w-fit">
                                        <a class="text-teal-500 hover:underline" href="/cart/{{ $item->id }}/edit">Edit</a>
                                        <form action="/cart/remove/{{ $item->phone->id }}" method="POST"
                                            class="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-rose-500 cursor-pointer hover:underline">Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-right">
                <h2 class="text-xl font-semibold">Total: ${{ number_format($total, 2) }}</h2>
                <a href="/checkout" class="bg-teal-600 text-white px-6 py-3 hover:bg-teal-500 mt-4 inline-block">Proceed
                    to
                    Checkout</a>
            </div>
        @else
            <p>Your cart is empty. Start shopping now!</p>
        @endif
    </div>
</x-layout>
