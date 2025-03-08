<x-layout>
    <x-slot:pageTitle>Phones</x-slot:pageTitle>

    <div class="bg-teal-100 py-16">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-5xl font-extrabold tracking-tight sm:text-6xl">
                Browse Our Phones
            </h1>
            <p class="mt-6 text-xl max-w-2xl mx-auto">
                Find your perfect phone from a wide selection of the latest models and top brands. Shop now!
            </p>

            <!-- Search Form -->
            <form action="/phones" method="GET" class="mt-8 flex justify-center">
                <x-form.input-field name='search' placeholder="Search phones..." class="min-w-md bg-white" value="{{ request()->query('search') }}" />
                <x-form.button-submit class="max-w-fit px-6">Search</x-form.button-submit>
            </form>
        </div>
    </div>

    <div class="py-16 bg-neutral-100">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold">All Phones</h2>
            <p class="mt-4 text-lg text-neutral-600">Browse through our collection of phones, from budget to premium options.</p>
            <div class="flex justify-center flex-wrap gap-6 p-6">
                @foreach ($phones as $phone)
                    <x-phone.phone-card :$phone />
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10 px-6">
                {{ $phones->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</x-layout>
