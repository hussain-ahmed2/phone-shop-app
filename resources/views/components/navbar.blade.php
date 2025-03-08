<header class="bg-white fixed w-full shadow-sm">
    <nav class="max-w-7xl mx-auto px-5 border-neutral-300 min-h-14 flex items-center justify-between">
        <a href="/" class="logo">Phones</a>

        <div class="flex space-x-5">
            <a class="nav-link {{ Request::is('/') ? 'text-teal-500' : '' }}" href="/">Home</a>
            <a class="nav-link " href="/#featured">Featured</a>
            <a class="nav-link {{ Request::is('phones') ? 'text-teal-500' : '' }}" href="/phones">Phones</a>
            <a class="nav-link" href="/#about-us">About Us</a>
        </div>

        <div class="flex items-center space-x-5">
            @auth
                @if (Auth::user()->is_admin)
                    <a class="btn-sm" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
                @else
                    <a class="btn-sm-bordered relative {{ Request::is('cart') ? 'ring-4 border-teal-500 text-white bg-teal-500' : '' }}" href="/cart">Cart
                        <div class="absolute -top-2 -right-2 border aspect-square h-5 rounded-full grid place-content-center font-light text-sm text-neutral-700 {{ Request::is('cart') ? 'border-teal-500 bg-white text-teal-500' : 'bg-white' }}">
                            {{ Auth::user()->cart ? count(Auth::user()->cart->items) : 0 }}
                        </div>
                    </a>
                    <a class="btn-sm {{ Request::is('dashboard') ? 'ring-4 border-teal-500 text-white bg-teal-500' : '' }}" href="/dashboard">Dashboard</a>
                @endif
                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button
                        class="btn-sm-bordered border-rose-500 text-rose-500 hover:text-white hover:bg-rose-500 ring-rose-500/50">Log
                        Out</button>
                </form>
            @endauth

            @guest
                <a class="btn-sm" href="/login">Login</a>
                <a class="btn-sm-bordered" href="/register">Register</a>
            @endguest
        </div>
    </nav>
</header>
