<x-layout>
    <x-slot:pageTitle>Admin Dashboard</x-slot:pageTitle>

    <!-- Admin Dashboard Content -->
    <div class="flex">
        <!-- Sidebar -->
        <x-admin.sidebar />

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Header -->
            <header class="flex items-center justify-between mb-8">
                <div class="text-xl font-bold text-neutral-800">Welcome, Admin</div>
            </header>

            <!-- Main Dashboard Content -->
            <div class="grid grid-cols-3 gap-6">
                <!-- Card 1: Total Phones -->
                <div class="bg-white p-6 shadow-lg">
                    <div class="font-semibold text-lg text-neutral-700">Total Phones</div>
                    <div class="text-3xl font-bold text-neutral-900">{{ $totalPhones }}</div>
                </div>

                <!-- Card 2: Total Orders -->
                <div class="bg-white p-6 shadow-lg">
                    <div class="font-semibold text-lg text-neutral-700">Total Orders</div>
                    <div class="text-3xl font-bold text-neutral-900">{{ $totalOrders }}</div>
                </div>

                <!-- Card 3: Total Users -->
                <div class="bg-white p-6 shadow-lg">
                    <div class="font-semibold text-lg text-neutral-700">Total Users</div>
                    <div class="text-3xl font-bold text-neutral-900">{{ $totalUsers }}</div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="mt-8">
                <h2 class="text-xl font-semibold text-neutral-800">Recent Activity</h2>
                <div class="mt-4 bg-white p-6-lg shadow-lg">
                    <ul>
                        @foreach ($activities as $activity)
                            <li class="p-3 border-b border-neutral-300">
                                <p>
                                    <span class="text-teal-600 font-semibold">{{ $activity->activity_type }}</span>:
                                    {{ $activity->description }}
                                </p>
                                <p class="text-sm text-neutral-500 mt-1">{{ $activity->created_at }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="mt-5">
                {{ $activities->links('pagination::custom') }}
            </div>
        </div>
    </div>
</x-layout>
