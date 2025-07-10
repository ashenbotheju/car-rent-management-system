@extends('layouts.app')
@section('title', 'Car Rental - Home')
@section('content')

    {{-- bg-[#FDFDFC] --}}
    <body class="bg-white dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col bg-gray-100">
        <div class="min-h-screen">
            <div class="relative flex items-center justify-center">
                <div class="relative isolate px-6 lg:px-8 w-full max-w-7xl ">
                    {{-- <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                        <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                        </div>
                    </div> --}}
                    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-40 text-center">
                        <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">Drive Your Dreams, Rent with Wenujaya</h1>
                        <p class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">Unlock your next adventure with Wenujaya Rent a Car. Whether you're planning a scenic road trip, a business journey, or just need a reliable ride, we've got the perfect vehicle to match your needs. Our diverse fleet, competitive prices, and commitment to customer satisfaction ensure you'll hit the road with confidence and comfort.</p>
                    </div>
                    {{-- <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]" aria-hidden="true">
                        <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                            style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                        </div>
                    </div> --}}
                </div>
            </div>

      </div>
      
    @if(session('success'))
        <script>
          alert("{{ session('success') }}");
        </script>
    @endif
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
@endsection

        </div>

        <!-- Your existing content here -->
        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif

        <!-- Vehicle Grid Section -->
        <div>
            <div class="text-center">
                <h1 class="text-4xl font-semibold tracking-tight text-balance text-gray-900 sm:text-5xl">Our vehicle fleet  </h1>
                <p class="mt-4 mb-10 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">Select from wide range of vehicles at affordable rates.</p>
            </div>
            <div class="flex justify-center">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3">
                     @foreach($vehicles as $vehicle)
                        <div class="w-full max-w-sm px-4 py-3 dark:bg-gray-800 text-center">
                            <div class="flex flex-col items-center justify-between">
                                {{-- <div class="w-full">
                                    <h1 class="text-lg font-bold text-gray-800 dark:text-gray-400">{{ $vehicle->brand }} {{ $vehicle->model }}</h1>
                                    <p class="text-sm font-light text-gray-800 dark:text-gray-400">{{ $vehicle->type }}</p>
                                </div> --}}
                            <div>
                    {{-- Wishlist icon if needed --}}
                        </div>
                </div>
                <img class="object-cover w-full h-48 rounded-md mt-2 mx-auto" src="{{ $vehicle->image_1}}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}">
                <div class="flex flex-col items-center justify-center mt-8 text-gray-700 dark:text-gray-200">
                    <div class="text-center">
                        <span class="text-2xl font-bold">Rs </span>
                        <span class="text-2xl font-bold">{{ $vehicle->daily_rate }}</span>
                        <span class="text-2xl font-bold">/</span>
                        <span class="">day</span>
                    </div>
                </div>
            </div>
        @endforeach
            </div>
            </div>
            <div class="mt-20 mb-20 flex items-center justify-center gap-x-6">
                <a href="{{ route('showVehicles') }}" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                View All Vehicles
                </a>
            </div> 
        </div>

        <div class="feature section"> 
            <div class="container mx-auto px-4 py-12 ">
                <h1 class="text-4xl md:text-5xl sm:text-5xl font-bold text-center mb-5 text-gray-900">Why Choose Our Service?</h1>
                <h1 class="mt-4 mb-20 text-lg text-center font-medium text-pretty text-gray-500 sm:text-xl/8">Reasons why we are the best car rental company in Sri Lanka</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Feature 1 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                        <div class="text-blue-600 mb-6 bg-blue-50 p-4 rounded-full w-14 h-16 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Easy and secure online booking capability</h3>
                        <p class="text-gray-500">Book in just 3 clicks with our military-grade encryption</p>
                    </div>
                    
                    <!-- Feature 2 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                        <div class="text-emerald-600 mb-6 bg-emerald-50 p-4 rounded-full w-16 h-16 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Free cancellation and booking amendments</h3>
                        <p class="text-gray-500">Change plans anytime with zero fees up to 24 hours before</p>
                    </div>
                    
                    <!-- Feature 3 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                        <div class="text-amber-600 mb-6 bg-amber-50 p-4 rounded-full w-16 h-16 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800">24/7 customer support and breakdown assistance</h3>
                        <p class="text-gray-500">Real humans answer your call within 30 seconds, guaranteed</p>
                    </div>
                    
                    <!-- Feature 4 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                        <div class="text-purple-600 mb-6 bg-purple-50 p-4 rounded-full w-16 h-16 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Modern fleet with leading vehicle brands</h3>
                        <p class="text-gray-500">2023-2024 models from Mercedes, BMW, Tesla and more</p>
                    </div>
                    
                    <!-- Feature 5 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                        <div class="text-rose-600 mb-6 bg-rose-50 p-4 rounded-full w-16 h-16 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Unbranded vehicles for added security</h3>
                        <p class="text-gray-500">Discreet rentals with no company branding for your privacy</p>
                    </div>
                    
                    <!-- Feature 6 -->
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-100">
                        <div class="text-indigo-600 mb-6 bg-indigo-50 p-4 rounded-full w-16 h-16 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-800">Unlimited Mileage for complete freedom</h3>
                        <p class="text-gray-500">Drive anywhere without worrying about distance limits</p>
                    </div>
                </div>
            </div>
        </div>

        <x-testimonials />
    @endsection
