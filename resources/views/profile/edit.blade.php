<x-layout>
    <x-slot:pageTitle>Edit Profile</x-slot:pageTitle>

    <div class="max-w-4xl mx-auto py-12 px-6">
        <h1 class="text-4xl font-bold text-teal-600">Edit Your Profile</h1>

        <form action="/profile" method="POST" class="mt-6 bg-white shadow-md rounded-lg p-6 space-y-4">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <x-form.input-field label="First Name" name="firstname" type="text" 
                                    value="{{ old('firstname', $user->firstname) }}" />
                
                <x-form.input-field label="Last Name" name="lastname" type="text" 
                                    value="{{ old('lastname', $user->lastname) }}" />
            </div>

            <x-form.input-field label="Email" name="email" type="email" 
                                value="{{ old('email', $user->email) }}" />

            <x-form.input-field label="New Password (optional)" name="password" type="password" :required="false" />

            <x-form.input-field label="Confirm Password" name="password_confirmation" type="password" :required="false" />

            <x-form.button-submit>Update</x-form.button-submit>
        </form>
    </div>
</x-layout>
