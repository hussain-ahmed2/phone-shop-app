<x-layout>
    <x-slot:pageTitle>Admin - Edit Phone</x-slot:pageTitle>

    <div class="flex">
        <x-admin.sidebar />

        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Edit Phone</h1>

            <form action="/admin/phones/{{ $phone->id }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                <x-form.input-field name="name" label="Phone Name" placeholder="Enter phone name" value="{{ $phone->name }}" />
                <x-form.input-field name="brand" label="Brand" placeholder="Enter brand name" value="{{ $phone->brand }}" />
                <x-form.input-field name="price" label="Price" type="number" step="0.01" placeholder="Enter price" value="{{ $phone->price }}" />
                <x-form.input-field name="stock" label="Stock" type="number" placeholder="Enter stock quantity" value="{{ $phone->stock }}" />
                <x-form.textarea-field name="description" label="Description" placeholder="Enter phone description">{{ $phone->description }}</x-form.textarea-field>
                <x-form.input-field name="specs" label="Specifications (JSON Format)" placeholder='{"RAM":"8GB", "Storage":"128GB"}' value="{!! $phone->specs !!}" />
                <x-form.input-field name="image" label="Phone Image" type="file" :required="false" />

                <x-form.button-submit>Update Phone</x-form.button-submit>
            </form>
        </div>
    </div>
</x-layout>
