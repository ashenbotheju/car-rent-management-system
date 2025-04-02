<div class="w-full max-w-sm px-4 py-3 bg-white rounded-md shadow-md dark:bg-gray-800">
    <div class="flex items-center justify-between">
        <div class="">
            <h1 class="text-lg font-bold text-gray-800 dark:text-gray-400">Toyota Aqua</h1>
            <p class="text-sm font-light text-gray-800 dark:text-gray-400">Car</p>
        </div>
        <div>
            {{-- <a href=""><img src="{{ asset('../images/car/wishlist-star.svg')}}" alt="" class="w-7 h-7"></a> --}}
        </div>
    </div>
    <img class="object-cover w-full h-48 mt-2" src="{{ asset('../images/car/toyota aqua.jpg')}}" alt="toyota aqua">
    <div class="flex items-center justify-between mt-3 mb-8">
        <div class="flex items-center">
            <img class="w-4 h-4 mr-2" src="{{ asset('../images/car/folder.svg')}}" alt="">
            <span class="text-gray-700 font-bold dark:text-gray-200">2020</span>
        </div>
        <div class="flex items-center">
            <img class="w-4 h-4 mr-2" src="{{ asset('../images/car/tire-rugged.svg')}}" alt="">
            <span class="text-gray-700 font-bold dark:text-gray-200">auto</span>
        </div>
        <div class="flex items-center">
            <img class="w-4 h-4 mr-2" src="{{ asset('../images/car/users.svg')}}">
            <span class="text-gray-700 font-bold dark:text-gray-200">4</span>
        </div>
    </div>
    <div>
        <p class="text-lg"><strong>Available</strong></p>
    </div>

    <div>
        <div class="flex items-center justify-between mt-2 text-gray-700 dark:text-gray-200">
            <div>
                <span class="text-2xl font-bold">Rs </span>
                <span class="text-2xl font-bold">15,000</span>
                <span class="text-2xl font-bold">/</span>
                <span class="">day</span>
            </div>
            <div>
                <a class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" href="{{ route('vehicleOverview')}}">Book Now</a>
            </div>
        </div>
    </div>
</div>

