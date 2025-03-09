<x-layout>
    <x-slot:pageTitle>Edit User</x-slot:pageTitle>

    <div class="flex">
        <x-admin.sidebar />

        <div class="flex-1 p-6">
            <header class="flex items-center justify-between mb-8">
                <h1 class="text-xl font-bold">Edit User</h1>
            </header>

            <div class="bg-white p-6 shadow-lg">
                <form class="space-y-4" method="POST" action="/admin/users/{{ $user->id }}">
                    @csrf
                    @method('PUT')

                    <x-form.input-field label="First Name" name="firstname" type="text" value="{{  $user->firstname }}" />
                    <x-form.input-field label="Last Name" name="lastname" type="text" value="{{ $user->lastname }}" />
                    <x-form.input-field label="Email" name="email" type="email" value="{{ $user->email }}" />
                    
                    <div class="">
                        <label for="role" class="font-medium">Role</label>
                        <select name="role" id="role" class="w-full border-2 border-neutral-400 p-2 focus:border-teal-400 focus:ring-4 ring-teal-500/50">
                            <option value="0" {{ $user->is_admin ? '' : 'selected' }}>User</option>
                            <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <p class="text-rose-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="bg-teal-500 text-white py-2 px-6 hover:bg-teal-600 transition duration-300">
                        Update User
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
