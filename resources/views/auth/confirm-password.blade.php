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
                Confirm your password
            </h2>
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                This is a secure area of the application. Please confirm your password before continuing.
            </p>

            {{-- Validation Errors --}}
            <x-validation-errors class="mb-4" />

            {{-- Form --}}
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                {{-- Password --}}
                <div>
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
                </div>

                {{-- Confirm Button --}}
                <div class="mt-6">
                    <x-button class="w-full bg-red-500 hover:bg-red-600 text-white font-medium rounded-lg py-2">
                        {{ __('Confirm') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
