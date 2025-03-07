<x-layout>
    <x-slot:pageTitle>Admin - Manage Phones</x-slot:pageTitle>

    <div class="flex">
        <x-admin.sidebar />

        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Create a New Phone</h1>
            
            <form action="/admin/phones" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <x-form.input-field name="name" label="Phone Name" placeholder="Enter phone name" />
                <x-form.input-field name="brand" label="Brand" placeholder="Enter brand name" />
                <x-form.input-field name="price" label="Price" type="number" step="0.01"
                    placeholder="Enter price" />
                <x-form.input-field name="stock" label="Stock" type="number" placeholder="Enter stock quantity" />
                <x-form.textarea-field name="description" label="Description" placeholder="Enter phone description" />
                <x-form.input-field name="specs" label="Specifications (JSON Format)"
                    placeholder='{"RAM":"8GB", "Storage":"128GB"}' />
                <x-form.input-field name="image" label="Phone Image" type="file" />

                <x-form.button-submit>Create Phone</x-form.button-submit>
            </form>
        </div>
    </div>
</x-layout>
