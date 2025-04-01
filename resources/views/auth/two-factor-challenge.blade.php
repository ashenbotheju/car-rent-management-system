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
                Two-Factor Authentication
            </h2>
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                {{ __('Please confirm access to your account by entering the authentication code or recovery code.') }}
            </p>

            {{-- Validation Errors --}}
            <x-validation-errors class="mb-4" />

            {{-- Form --}}
            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                {{-- Code Input --}}
                <div class="mt-4" x-show="!recovery">
                    <x-label for="code" value="{{ __('Authentication Code') }}" />
                    <x-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                {{-- Recovery Code Input --}}
                <div class="mt-4" x-cloak x-show="recovery">
                    <x-label for="recovery_code" value="{{ __('Recovery Code') }}" />
                    <x-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                {{-- Toggle Button --}}
                <div class="flex items-center justify-between mt-4">
                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                            x-show="!recovery"
                            x-on:click="recovery = true; $nextTick(() => { $refs.recovery_code.focus() })">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                            x-cloak
                            x-show="recovery"
                            x-on:click="recovery = false; $nextTick(() => { $refs.code.focus() })">
                        {{ __('Use an authentication code') }}
                    </button>
                </div>

                {{-- Login Button --}}
                <div class="mt-6">
                    <x-button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-lg">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
