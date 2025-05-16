<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-center text-3xl font-bold mb-8">What our happy users say!</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($testimonials as $testimonial)
                <div class="bg-white shadow rounded-lg p-6 text-center">
                    <div class="text-yellow-500 text-xl mb-2">
                        ★ {{ number_format($testimonial->rating, 1) }}
                    </div>
                    <p class="text-gray-600 mb-4">"{{ $testimonial->testimonial }}"</p>
                    <div class="flex flex-col items-center">
                        <!-- Fixed image tag -->
                        <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}"
                            class="w-14 h-14 rounded-full object-cover mb-2">
                        <h4 class="font-semibold">{{ $testimonial->name }}</h4>
                        <span class="text-sm text-gray-500">{{ $testimonial->position }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
