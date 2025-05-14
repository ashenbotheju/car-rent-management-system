<div class="absolute inset-x-0 top-0 z-50 mb-30">
    <nav class="flex items-center justify-between p-6 lg:px-40" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="{{ route('home') }}" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <x-logo />
            </a>
        </div>
        <div class="flex lg:hidden">
            <button type="button" id="mobile-menu-button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="{{ route('home') }}" class="text-sm/6 font-semibold text-gray-900">Home</a>
            <a href="{{ route('showVehicles') }}" class="text-sm/6 font-semibold text-gray-900">Vehicles</a>
            <a href="{{ route('showSupport') }}" class="text-sm/6 font-semibold text-gray-900">Support</a>
            <a href="{{ route('showContact') }}" class="text-sm/6 font-semibold text-gray-900">Contact</a>
            <a href="{{ route('showAbout') }}" class="text-sm/6 font-semibold text-gray-900">About US</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @auth
                <x-profile-dropdown />
            @else
                <a href="{{ route('login') }}" class="text-sm/6 font-semibold text-gray-900">Log in</a>
                <p class="text-sm/6 font-semibold text-gray-900 mr-2 ml-2">|</p>
                <a href="{{ route('register') }}" class="text-sm/6 font-semibold text-gray-900">Sign in</a>
            @endauth
        </div>
    </nav>

    <!-- Mobile menu -->
    <div id="mobile-menu" class="fixed inset-x-0 z-50 hidden">
        <!-- Background backdrop that closes the menu when clicked -->
        <div id="mobile-menu-backdrop" class="fixed inset-0 bg-gray-900/50 transition-opacity duration-300 opacity-0">
        </div>

        <!-- Menu panel that slides in from the right -->
        <div
            class="fixed inset-y-0 right-0 z-50 w-full max-w-sm overflow-y-auto bg-white px-6 py-6 transition-transform duration-300 transform translate-x-full">
            <div class="flex items-center justify-between">
                <a href="" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <x-logo />
                </a>
                <button type="button" id="mobile-menu-close-button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                        <a href="{{ route('home') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Home</a>
                        <a href="{{ route('showVehicles') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Vehicles</a>
                        <a href="{{ route('showSupport') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Support</a>
                        <a href="{{ route('showContact') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">Contact</a>
                        <a href="{{ route('showAbout') }}"
                            class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold text-gray-900 hover:bg-gray-50">About
                            Us</a>
                    </div>
                    <div class="py-6">
                        @auth
                         <x-profile-dropdown />
                        @else
                        <a href="{{ route('login') }}"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold text-gray-900 hover:bg-gray-50">Log
                            in</a>
                        <a href="{{ route('register') }}"
                            class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold text-gray-900 hover:bg-gray-50">Sign
                            in</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenuCloseButton = document.getElementById('mobile-menu-close-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuBackdrop = document.getElementById('mobile-menu-backdrop');
        const mobileMenuPanel = mobileMenu.querySelector('div > div:last-child'); // The panel that slides in

        function openMenu() {
            mobileMenu.classList.remove('hidden');
            // Trigger reflow to enable transitions
            void mobileMenu.offsetWidth;
            mobileMenuBackdrop.classList.remove('opacity-0');
            mobileMenuPanel.classList.remove('translate-x-full');
            document.body.style.overflow = 'hidden';
        }

        function closeMenu() {
            mobileMenuBackdrop.classList.add('opacity-0');
            mobileMenuPanel.classList.add('translate-x-full');
            // Wait for transition to complete before hiding
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = '';
            }, 300);
        }

        mobileMenuButton.addEventListener('click', openMenu);
        mobileMenuCloseButton.addEventListener('click', closeMenu);
        mobileMenuBackdrop.addEventListener('click', closeMenu);

        // Close menu when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                closeMenu();
            }
        });
    });
</script>
