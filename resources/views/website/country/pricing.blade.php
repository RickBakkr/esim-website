<section class="grid grid-cols-1 md:grid-cols-2 gap-8">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-xl font-semibold mb-4">eSIM Details</h2>
        <div class="flex flex-wrap space-x-6 mb-4">
            <div class="flex items-center space-x-2">
                <span>🕒</span>
                <p>Instant delivery</p>
            </div>
            <div class="flex items-center space-x-2">
                <span>🌐</span>
                <p>24/7 Support</p>
            </div>
            <div class="flex items-center space-x-2">
                <span>🔒</span>
                <p>Privacy guaranteed</p>
            </div>
            <div class="flex items-center space-x-2">
                <span>📶</span>
                <p>The best network</p>
            </div>
        </div>
    </div>
    <!-- Pricing Section -->
    <div x-data="{ link: null, price: null }" class="bg-white shadow-lg rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold">Kies je pakket</h2>
        </div>

        @if(count($plans) > 0)
            <fieldset class="mb-6">
                <div class="grid grid-cols-3 gap-4">
                    @foreach($plans as $plan)
                        @php($random = rand(10000, 100000))
                        <div class="relative flex items-start">
                            <div class="flex h-6 items-center">
                                <input name="chosenPlan" id="{{ $random }}" value="{{ $plan['link'] }}" type="radio"
                                       x-on:click="link = '{{ $plan['link'] }}', price = '{{ $plan['price'] }}'"
                                       class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            </div>
                            <div class="ml-3 text-sm/6">
                                <label for="{{ $random }}" class="font-medium text-gray-900">{{ $plan['name'] }}</label>
                                <p id="small-description" class="text-gray-500">
                                    {{ $plan['price'] }} / {{ $plan['days_valid'] }} {{ trans('sales.days') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </fieldset>

            <div class="space-x-2 mb-4" x-show="link !== null">
                <p class="text-3xl font-bold"><span x-text="price ? price : '-'"></span></p>

                <br/>

                <button x-on:click="window.location = link" class="bg-black text-white px-6 py-2 rounded-lg">
                    Buy Now
                </button>
            </div>
        @else
            <div class="rounded-md bg-yellow-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                            <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-yellow-800">
                            {{ trans('sales.not_available_yet') }}
                        </h3>
                        <div class="mt-2 text-sm text-yellow-700">
                            <p>
                                {{ trans('sales.not_available_yet_contact_us') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<!-- Works In Other Countries Section -->
<section class="container mx-auto p-6 md:p-10">
    <h2 class="text-xl font-semibold mb-4">eSIM also works in</h2>
    <div class="flex flex-wrap gap-2">
        <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full">Greece</span>
        <span class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full">Finland</span>
        <!-- Add other countries as needed -->
    </div>
</section>

<!-- FAQ Section -->
<section class="container mx-auto p-6 md:p-10">
    <h2 class="text-xl font-semibold mb-4">Common Questions</h2>
    <div class="space-y-4">
        <div class="border-b">
            <button class="w-full flex justify-between items-center text-left py-2">
                <span>What is an eSIM?</span>
                <span>+</span>
            </button>
        </div>
        <!-- Add other FAQs as needed -->
    </div>
</section>

<!-- Footer Section -->
<footer class="bg-gradient-to-r from-purple-500 to-pink-500 text-white p-10">
    <div class="container mx-auto text-center">
        <h3 class="text-lg font-semibold mb-4">Ready for Your Next Trip?</h3>
        <p class="mb-6">Ensure seamless connectivity abroad with NoLimit's reliable data plan...</p>
        <button class="bg-black text-white px-6 py-2 rounded-lg">Get Your Data Plan</button>
    </div>
    <div class="container mx-auto mt-10 text-center text-sm">
        <p>&copy; 2024 NoLimit Inc. All rights reserved.</p>
    </div>
</footer>
