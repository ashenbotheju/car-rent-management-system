<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center dark:bg-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-md p-8">
            {{-- Logo --}}
            <div class="flex justify-center mb-6">
                {{-- <img src="{{ asset('images/VLogo.png') }}" alt="Logo" class="w-40 h-40"> --}}
                <x-logo />
            </div>

            {{-- Title & Subtitle --}}
            <h2 class="text-center text-2xl font-semibold text-gray-800 dark:text-white mt-4">Create an account</h2>
            <p class="text-center text-gray-500 dark:text-gray-400 mt-1">Sign up to get started</p>


            <!-- Google Login Button -->
            <div class="mt-6">
                <a href="{{ route('google.redirect') }}"
                    class="flex items-center justify-center w-full px-4 py-2 bg-red-500 text-white font-medium rounded-lg hover:bg-red-600 transition">
                    <img src="{{ asset('icons/google-icon.svg') }}" class="w-5 h-5 mr-2" alt="Google">
                    Continue with Google
                </a>
            </div>


            {{-- Divider --}}
            <div class="flex items-center my-4">
                <div class="flex-1 border-t border-gray-300"></div>
                <span class="mx-3 text-sm text-gray-500">or</span>
                <div class="flex-1 border-t border-gray-300"></div>
            </div>

            {{-- Validation Errors --}}
            <x-validation-errors class="mb-4" />

            {{-- Registration Form --}}
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div>
                    <x-label for="name" value="Name" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="Email" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="Password" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="Confirm Password" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required />
                </div>

                {{-- Terms & Privacy Policy --}}
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4 text-sm text-gray-600">
                        <label for="terms">
                            <x-checkbox name="terms" id="terms" required />
                            I agree to the
                            <a href="{{ route('terms.show') }}" class="text-blue-500 hover:underline">Terms of
                                Service</a>
                            and
                            <a href="{{ route('policy.show') }}" class="text-blue-500 hover:underline">Privacy
                                Policy</a>.
                        </label>
                    </div>
                @endif

                <!-- Register Button -->
                {{-- <button type="submit"
                    class="w-full bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg py-2 mt-6">
                    Register
                </button> --}}
                <div class="mt-6">
                    <x-button class="w-full flex justify-center ">
                        Register
                    </x-button>
                </div>


                {{-- Login Redirect --}}
                <p class="text-center text-gray-500 dark:text-gray-400 text-sm mt-4">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Log in</a>
                </p>
        </div>
    </div>
</x-guest-layout>
