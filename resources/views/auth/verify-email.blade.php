<x-guest-layout>
    <div class="flex min-h-screen items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-md p-8">

            {{-- Logo --}}
            <div class="flex justify-center mb-6">
                <x-logo />
            </div>

            {{-- Heading --}}
            <h2 class="text-center text-2xl font-semibold text-gray-800 dark:text-white mt-4">
                {{ __('Verify Your Email Address') }}
            </h2>
            <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </p>

            {{-- Status Message --}}
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                </div>
            @endif

            {{-- Resend Verification Form --}}
            <form method="POST" action="{{ route('verification.send') }}" class="mt-4">
                @csrf
                <x-button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 rounded-lg">
                    <div class="text-center w-full">
                        {{ __('Resend Verification Email') }}
                    </div>
                </x-button>
            </form>

            {{-- Edit Profile and Logout --}}
            <div class="mt-4 flex justify-between">
                <a href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Edit Profile') }}
                </a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 ">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
