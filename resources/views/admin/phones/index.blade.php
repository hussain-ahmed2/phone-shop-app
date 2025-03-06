<x-layout>
    <x-slot:pageTitle>Admin - Manage Phones</x-slot:pageTitle>

    <div class="flex">
        <x-admin.sidebar />

        <div class="flex-1 p-6">
            <header class="flex items-center justify-between mb-8">
                <div class="text-xl font-bold text-neutral-800">Manage Phones</div>
                <a href="/admin/phones/create" class="bg-teal-500 hover:bg-teal-600 transition duration-300 text-white py-2 px-4">Add New Phone</a>
            </header>

            <div class="bg-white p-6 shadow-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Brand</th>
                            <th class="px-4 py-2">Price</th>
                            <th class="px-4 py-2">Stock</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phones as $phone)
                            <tr>
                                <td class="border px-4 py-2">{{ $phone->name }}</td>
                                <td class="border px-4 py-2">{{ $phone->brand }}</td>
                                <td class="border px-4 py-2">{{ $phone->price }}</td>
                                <td class="border px-4 py-2">{{ $phone->stock }}</td>
                                <td class="border px-4 py-2">
                                    <a href="/admin/phones/{{ $phone->id }}/edit" class="text-teal-600">Edit</a>
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
