<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-md p-8">
            {{-- Logo --}}
            <div class="flex justify-center mb-6">
                {{-- <img src="{{ asset('images/VLogo.png') }}" alt="Logo" class="w-40 h-40"> <!-- Adjust logo size --> --}}
                <x-logo />
            </div>

            {{-- Forgot Password Text --}}
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>

            {{-- Status Message --}}
            @session('status')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ $value }}
                </div>
            @endsession

            {{-- Validation Errors --}}
            <x-validation-errors class="mb-4" />

            {{-- Password Reset Form --}}
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                {{-- Email Field --}}
                <div class="block">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                {{-- Submit Button --}}
                <div class="flex items-center justify-end mt-4">
                    <x-button class="w-full items-center justify-center ">
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
