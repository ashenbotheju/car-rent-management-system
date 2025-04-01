<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-md p-8">

            {{-- Logo --}}
            <div class="flex justify-center mb-6">
                {{-- <img src="{{ asset('images/VLogo.png') }}" alt="Logo" class="w-14 h-14"> --}}
                <x-logo />
            </div>

            {{-- Heading --}}
            <h2 class="text-center text-2xl font-semibold text-gray-800 dark:text-white mt-4">
                Reset Your Password
            </h2>
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                Please enter your email address and new password to reset your password.
            </p>

            {{-- Validation Errors --}}
            <x-validation-errors class="mb-4" />

            {{-- Form --}}
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                {{-- Email --}}
                <div class="block">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                </div>

                {{-- Password --}}
                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>

                {{-- Confirm Password --}}
                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>

                {{-- Reset Button --}}
                <div class="mt-6">
                    <x-button class="w-full bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg py-2">
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
