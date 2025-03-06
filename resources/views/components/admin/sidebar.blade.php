<div class="w-64 bg-teal-800 text-white min-h-[calc(100vh-4rem)] p-5">
    <div class="mb-6 text-2xl font-bold">Admin Dashboard</div>
    <ul>
        <li>
            <a href="/admin/dashboard"
                class="block p-2 hover:bg-teal-700 transition duration-300 {{ request()->is('admin/dashboard') ? 'bg-teal-700' : '' }}">
                Dashboard
            </a>
        </li>
        <li>
            <a href="/admin/phones"
                class="block p-2 hover:bg-teal-700 transition duration-300 {{ request()->is('admin/phones*') ? 'bg-teal-700' : '' }}">
                Phones
            </a>
        </li>
        <li>
            <a href="/admin/orders"
                class="block p-2 hover:bg-teal-700 transition duration-300 {{ request()->is('admin/orders*') ? 'bg-teal-700' : '' }}">
                Orders
            </a>
        </li>
        <li>
            <a href="/admin/users"
                class="block p-2 hover:bg-teal-700 transition duration-300 {{ request()->is('admin/users*') ? 'bg-teal-700' : '' }}">
                Users
            </a>
        </li>
        <li>
            <a href="/admin/settings"
                class="block p-2 hover:bg-teal-700 transition duration-300 {{ request()->is('admin/settings*') ? 'bg-teal-700' : '' }}">
                Settings
            </a>
        </li>
    </ul>
</div>
