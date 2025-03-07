<x-layout>
    <x-slot:pageTitle>Admin - Manage Phones</x-slot:pageTitle>

    <div class="flex">
        <x-admin.sidebar />

        <div class="flex-1 p-6">
            <header class="flex items-center justify-between mb-8">
                <div class="text-xl font-bold text-neutral-800">Manage Phones</div>
                <a href="/admin/phones/create"
                    class="px-6 py-2 border-2 border-teal-500 text-teal-500 bg-white active:ring-4 ring-teal-500/50 hover:border-teal-500 hover:bg-teal-500 hover:text-white transition duration-300">Add New Phone</a>
            </header>

            <div class="bg-white p-6 shadow-lg">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Image</th>
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
                                <td class="border px-4 py-2">
                                    @if ($phone->image)
                                        <img src="{{ asset('storage/' . $phone->image) }}" alt="Phone Image"
                                            class="w-16 h-16">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td class="border px-4 py-2">{{ $phone->name }}</td>
                                <td class="border px-4 py-2">{{ $phone->brand }}</td>
                                <td class="border px-4 py-2">{{ $phone->price }}</td>
                                <td class="border px-4 py-2">{{ $phone->stock }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex justify-between">
                                        <a href="/admin/phones/{{ $phone->id }}/edit" class="text-teal-600 hover:underline">Edit</a>
                                        <span class="w-px bg-neutral-400"></span>
                                        <form class="inline" action="/admin/phones/{{ $phone->id }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this phone?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-rose-500 cursor-pointer hover:underline">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
