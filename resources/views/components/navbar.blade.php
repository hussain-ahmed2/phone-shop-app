<header class="bg-white fixed w-full">
    <nav class="max-w-7xl mx-auto px-5 shadow-sm border-neutral-300 min-h-14 flex items-center justify-between">
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
                <a class="btn-sm" href="/login">Login</a>
                <a class="btn-sm-bordered" href="/register">Register</a>
            @endguest
        </div>
    </nav>
</header>
