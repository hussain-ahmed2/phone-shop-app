<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $pageTitle ?? 'Home' }} | Phones </title>

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-neutral-200 text-neutral-900">

    <x-navbar />


    <main class="py-14 max-w-7xl mx-auto min-h-[calc(100vh-12.75rem)]">
        <!-- Global Flash Messages -->
        @if (session('success'))
            <div
                class="bg-green-100 text-green-800 p-4 rounded mb-6 flex justify-between items-center transition-all duration-300 origin-top">
                {{ session('success') }}
                <button onclick="this.parentElement.classList.add('scale-y-0', 'h-0')"
                    class="text-3xl cursor-pointer px-2 transition-all duration-300 origin-top">&times;</button>
            </div>
        @elseif (session('error'))
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6 flex justify-between items-center">
                {{ session('error') }}
                <button onclick="this.parentElement.classList.add('scale-y-0', 'h-0')"
                    class="text-3xl cursor-pointer px-2 transition-all duration-300 origin-top">&times;</button>
            </div>
        @endif

        {{ $slot }}
    </main>

    <footer class="bg-teal-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center">
                <!-- Logo/Branding -->
                <div class="text-2xl font-semibold">
                    <a href="/" class="text-white">Phones</a>
                </div>

                <!-- Links -->
                <div class="flex space-x-8">
                    <a href="#" class="hover:text-teal-300">About Us</a>
                    <a href="#shop" class="hover:text-teal-300">Shop</a>
                    <a href="#contact" class="hover:text-teal-300">Contact</a>
                    <a href="#" class="hover:text-teal-300">Privacy Policy</a>
                </div>
            </div>

            <div class="mt-6 text-center text-sm text-neutral-400">
                <p>&copy; {{ date('Y') }} Phones. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</body>

</html>
