@props(['phone'])

<div class="bg-white border border-neutral-300 shadow-lg hover:shadow-xl overflow-hidden hover:bg-teal-100 hover:border-teal-500 transition duration-300">
    <img src="{{ asset('storage/' . $phone->image) }}" alt="{{ $phone->name }}" class="h-72 w-72 mx-auto object-fit">

    <div class="p-4">
        <h2 class="text-lg font-semibold text-neutral-800">{{ $phone->name }}</h2>
        <p class="text-sm text-neutral-500">{{ $phone->brand }}</p>
        <p class="text-xl font-bold text-teal-600 mt-2">${{ number_format($phone->price, 2) }}</p>
        <div class="mt-4">
            <a href="/phones/{{ $phone->id }}" class="btn-sm-bordered inline-block">View Details</a>
        </div>
    </div>
</div>
