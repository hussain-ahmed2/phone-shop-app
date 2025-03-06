<header class="bg-white fixed w-full">
    <nav class="max-w-7xl mx-auto px-5 border-b border-neutral-300 min-h-14 flex items-center justify-between">
        <a href="#" class="logo">Phones</a>

        <div class="flex space-x-5">
            <a class="nav-link" href="#">Home</a>
            <a class="nav-link" href="#">Featured</a>
            <a class="nav-link" href="#">Latest</a>
            <a class="nav-link" href="#">About Us</a>
        </div>

        <div class="flex space-x-5">
            @auth
                <a class="nav-link" href="#">Dashboard</a>
            @endauth

            @guest
                <a class="btn-sm hover:border-teal-300 hover:text-teal-500" href="#">Login</a>
                <a class="btn-sm border-neutral-300 hover:border-teal-300 hover:bg-teal-500 hover:text-white" href="#">Register</a>
            @endguest
        </div>
    </nav>
</header>
