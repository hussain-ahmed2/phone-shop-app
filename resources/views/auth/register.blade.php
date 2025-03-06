<x-layout>
    <x-slot:pageTitle>Register an Account</x-slot:pageTitle>

    <div class="max-w-2xl mx-auto bg-white p-6 md:p-8 shadow-lg mt-10">
        <h2 class="text-2xl font-semibold text-center mb-4">Create Your Account</h2>
        <p class="text-neutral-600 text-center mb-6">Fill in the details below to get started.</p>

        <form action="/register" method="POST" class="space-y-4">
            @csrf

            <x-form.input-field name="firstname" label="First Name" placeholder="Enter your first name" />
            <x-form.input-field name="lastname" label="Last Name" placeholder="Enter your last name" />
            <x-form.input-field name="email" label="Email Address" type="email" placeholder="Enter your email" />
            <x-form.input-field name="password" label="Password" type="password" placeholder="Create a password" />
            <x-form.input-field name="password_confirmation" label="Confirm Password" type="password" placeholder="Confirm your password" />

            <x-form.button-submit>Register</x-form.button-submit>

            <p class="text-sm text-center text-neutral-600 mt-4">
                Already have an account? <a href="/login" class="text-teal-500 hover:underline">Login here</a>
            </p>
        </form>
    </div>
</x-layout>
