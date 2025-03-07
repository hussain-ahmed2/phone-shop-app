<x-layout>
    <x-slot:pageTitle>Home</x-slot:pageTitle>

    <div class="bg-teal-100 py-16">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-5xl font-extrabold tracking-tight sm:text-6xl">
                Welcome to the Best Phone Shop
            </h1>
            <p class="mt-6 text-xl max-w-2xl mx-auto">
                Discover the latest models, unbeatable prices, and great deals. Find your perfect phone now!
            </p>

            <div class="mt-10 space-x-4">
                <a href="#shop" class="btn-bordered">
                    Shop Now
                </a>
                <a href="#about" class="btn">
                    Learn More
                </a>
            </div>
        </div>
    </div>

    <div id="featured" class="py-16 bg-neutral-100">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold">Featured Phones</h2>
            <p class="mt-4 text-lg text-neutral-600">Explore some of our best sellers and latest arrivals.</p>
            <!-- Add featured phone items here -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6">
                @foreach ($phones as $phone)
                    <x-phone.phone-card :$phone />
                @endforeach
            </div>
        </div>
    </div>

    <div id="about" class="py-16">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-teal-600">About Us</h2>
            <p class="mt-4 text-lg text-neutral-700">We are passionate about bringing you the best phone models with the
                best customer service. Your satisfaction is our priority.</p>
        </div>
    </div>
</x-layout>
