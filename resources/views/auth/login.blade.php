<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center dark:bg-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-md p-8">
            <!-- Logo -->
            <div class="flex justify-center">
                <x-logo />
            </div>

            <!-- Heading -->
            <h2 class="text-center text-2xl font-semibold text-gray-800 dark:text-white mt-4">
                Welcome back
            </h2>
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                Please enter your details to sign in.
            </p>

            <!-- Success Message (after registration, password reset, etc.) -->
            @if (session('status'))
                <div
                    class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Google Login Button -->
            <div class="mt-6">
                <a href="{{ route('google.redirect') }}"
                    class="flex items-center justify-center w-full px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition">
                    <img src="{{ asset('icons/google-icon.svg') }}" class="w-5 h-5 mr-2" alt="Google">
                    Continue with Google
                </a>
            </div>

            <!-- Separator -->
            <div class="relative mt-6 flex items-center justify-center">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                </div>
                <div class="relative bg-white dark:bg-gray-800 px-4 text-gray-500 dark:text-gray-400">
                    or
                </div>
            </div>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-lg text-sm">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Email -->
                <div>
                    <x-label for="email" value="Email" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" placeholder="Enter your email" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" value="Password" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="current-password" placeholder="********" />
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="flex items-center">
                        <x-checkbox id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember for 30 days</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline"
                            href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <div class="mt-6">
                    <x-button class="w-full flex justify-center">
                        Sign in
                    </x-button>
                </div>
            </form>

            <!-- Create Account -->
            <p class="mt-4 text-center text-sm text-gray-500 dark:text-gray-400">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-indigo-600 dark:text-indigo-400 hover:underline">
                    Create account
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
