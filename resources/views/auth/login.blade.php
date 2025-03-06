<x-layout>
    <x-slot:pageTitle>Login to Your Account</x-slot:pageTitle>

    <div class="max-w-2xl mx-auto bg-white p-6 md:p-8 shadow-lg mt-10">
        <h2 class="text-2xl font-semibold text-center mb-4">Welcome Back!</h2>
        <p class="text-neutral-600 text-center mb-6">Enter your credentials to access your account.</p>

        <form action="/login" method="POST" class="space-y-4">
            @csrf

            <x-form.input-field name="email" label="Email Address" type="email" placeholder="Enter your email" />
            <x-form.input-field name="password" label="Password" type="password" placeholder="Enter your password" />

            <div class="flex items-center justify-between">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="mr-2 w-4 h-4 border-neutral-300 checked:border-teal-500 checked:bg-teal-500">
                    <span class="text-sm text-neutral-700">Remember Me</span>
                </label>
                <a href="/forgot-password" class="text-sm text-teal-500 hover:underline">Forgot Password?</a>
            </div>

            <x-form.button-submit>Login</x-form.button-submit>

            <p class="text-sm text-center text-neutral-600 mt-4">
                Don't have an account? <a href="/register" class="text-teal-500 hover:underline">Register here</a>
            </p>
        </form>
    </div>
</x-layout>
