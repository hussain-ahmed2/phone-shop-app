<x-layout>
    <x-slot:pageTitle>Admin - Manage Users</x-slot:pageTitle>

    <div class="flex">
        <x-admin.sidebar />

        <div class="flex-1 p-6">
            <header class="flex items-center justify-between mb-8">
                <div class="text-xl font-bold text-neutral-800">Manage Users</div>
                <a href="/admin/users/create" class="bg-teal-500 hover:bg-teal-600 transition duration-300 text-white py-2 px-4">Add New User</a>
            </header>

            <div class="bg-white p-6 shadow-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->firstname }} {{ $user->lastname }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">{{ $user->is_admin ? "Admin" : "User" }}</td>
                                <td class="border px-4 py-2">
                                    <a href="/admin/users/{{ $user->id }}/edit" class="text-teal-600">Edit</a>
                                    <!-- Add Delete Option here if necessary -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
