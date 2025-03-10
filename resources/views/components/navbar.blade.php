<header class="bg-white fixed w-full shadow-sm">
    <nav class="max-w-7xl mx-auto px-5 max-md:pe-0 border-neutral-300 min-h-14 flex items-center justify-between">
        <a href="/" class="logo">Phones</a>

        <div id="nav-links-container"
            class="flex max-md:hidden md:space-x-5 max-md:absolute max-md:top-14 max-md:right-0 max-md:left-0 bg-white max-md:flex-col max-md:w-full max-md:shadow-sm">
            <a class="nav-link {{ Request::is('/') ? 'text-teal-500' : '' }}" href="/">Home</a>
            <a class="nav-link " href="/#featured">Featured</a>
            <a class="nav-link {{ Request::is('phones') ? 'text-teal-500' : '' }}" href="/phones">Phones</a>
            <a class="nav-link" href="/#about-us">About Us</a>
        </div>

        <div class="flex items-center space-x-5 max-md:ms-auto">
            @auth
                @if (Auth::user()->is_admin)
                    <a class="btn-sm" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                @else
                    <a class=" relative hover:bg-teal-200 rounded-full h-10 w-10 flex items-center justify-center {{ Request::is('cart') ? 'border-teal-200 text-white bg-teal-200' : '' }}"
                        href="/cart">
                        <box-icon name='cart'></box-icon>
                        <div
                            class="absolute -top-2 -right-2 border aspect-square h-5 rounded-full grid place-content-center font-light text-sm text-neutral-700 {{ Request::is('cart') ? 'border-teal-500 bg-white text-teal-500' : 'bg-white' }}">
                            {{ Auth::user()->cart ? count(Auth::user()->cart->items) : 0 }}
                        </div>
                    </a>
                    <a class="hover:bg-teal-200 rounded-full h-10 w-10 flex items-center justify-center {{ Request::is('dashboard') ? 'border-teal-200 text-white bg-teal-200' : '' }}"
                        href="/dashboard">
                        <box-icon name='user'></box-icon>
                    </a>
                @endif
                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button
                        class="h-10 w-10 flex items-center justify-center rounded-full border-rose-200 text-rose-200 hover:text-white hover:bg-rose-200">
                        <box-icon name='log-out-circle'></box-icon></button>
                </form>
            @endauth

            @guest
                <a class="btn-sm" href="/login">Login</a>
                <a class="btn-sm-bordered" href="/register">Register</a>
            @endguest
        </div>

        <button id="nav-toggle-btn" class="md:hidden text-2xl h-14 w-14 hover:bg-slate-200 active:bg-slate-300">
            &#9776;
        </button>
    </nav>
</header>


<script>
    const navToggleBtn = document.getElementById('nav-toggle-btn');
    const navLinksContainer = document.getElementById('nav-links-container');
    const navLinks = document.querySelectorAll('a.nav-link');

    navToggleBtn.addEventListener('click', () => {
        navLinksContainer.classList.toggle('max-md:hidden');
    });

    navLinks.forEach(link => link.addEventListener('click', () => {
        navLinksContainer.classList.add('max-md:hidden');
    }));
</script>
