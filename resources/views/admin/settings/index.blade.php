<x-layout>
    <x-slot:pageTitle>Admin - Settings</x-slot:pageTitle>

    <div class="flex">
        <x-admin.sidebar />

        <div class="flex-1 p-6">
            <header class="flex items-center justify-between mb-8">
                <div class="text-xl font-bold text-neutral-800">Settings</div>
                <a href="/admin/settings/edit" class="bg-teal-500 hover:bg-teal-600 transition duration-300 text-white py-2 px-4">Edit Settings</a>
            </header>

            <div class="bg-white p-6 shadow-lg">
                <p>Settings content or form will go here.</p>
            </div>
        </div>
    </div>
</x-layout>
