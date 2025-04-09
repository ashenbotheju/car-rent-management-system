<div x-data="{ open: false }" class="relative ml-3">
    <!-- Profile button -->
    <button @click="open = !open" type="button"
        class="flex items-center max-w-xs text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
        <span class="sr-only">Open user menu</span>
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <img class="h-8 w-8 rounded-full" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
        @else
            <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-500">
                <span class="text-sm font-medium leading-none text-white">{{ substr($user->name, 0, 1) }}</span>
            </span>
        @endif
    </button>

    <!-- Dropdown menu -->
    <div x-show="open" @click.away="open = false" x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
        <!-- Account Management -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            {{ __('Manage Account') }}
        </div>

        <a href="{{ route('user.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
            role="menuitem" tabindex="-1">
            {{ __('Profile') }}
        </a>

        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <a href="{{ route('api-tokens.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                role="menuitem" tabindex="-1">
                {{ __('API Tokens') }}
            </a>
        @endif

        <div class="border-t border-gray-200"></div>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}" x-data>
            @csrf
            <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100"
                role="menuitem" tabindex="-1">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</div>
