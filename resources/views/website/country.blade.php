<x-app-layout>

    @include('website.country.header')

    <section class="py-6 px-4">
        <p class="text-lg text-gray-600">
            {{ $country->description }}
        </p>
    </section>

    @include('website.country.pricing')

    <!-- How It Works -->
    <section class="my-8">
        <h3 class="text-xl font-bold mb-4">{{ trans('homepage.how_it_works') }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @foreach(trans('homepage.steps') as $key => $step)
                <div class="p-4 bg-white shadow-md rounded-lg">
                    <h4 class="font-bold mb-2">
                        {{ $step['title'] }}
                    </h4>
                    <p>
                        {{ $step['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Supported Networks -->
    <section class="my-8">
        <h3 class="text-xl font-bold mb-4">{{ trans('homepage.supported_networks') }}</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach(getSupportedNetworks() as $networkLogo)
                <div class="p-4 bg-white shadow-md rounded-lg text-center">
                    <img src="{{ asset('images/networks/' . $networkLogo) }}" class="h-16 mx-auto filter grayscale transition duration-300 hover:grayscale-0">
                </div>
            @endforeach
                <div class="p-4 bg-white shadow-md rounded-lg text-center">
                    <br />
                    {{ trans('homepage.and_many_more') }}
                </div>
        </div>
    </section>

    <!-- User Feedback -->
    <section class="my-8">
        <h3 class="text-xl font-bold mb-4">{{ trans('homepage.user_reviews') }}</h3>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @foreach(getRandomReviews(5) as $review)
                <div class="p-4 bg-white shadow-md rounded-lg">
                    <h4 class="font-bold">{{ $review['name'] }}</h4>
                    <p class="text-green-600">
                        @for($i = 0; $i < $review['stars']; $i++)
                            ★
                        @endfor
                    </p>
                    <p>{{ $review['message'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="my-8">
        @include('partials.faq')
    </section>
    {{--  --}}
    {{--    <!-- Footer -->--}}
    {{--    <footer class="bg-gray-800 text-white py-8">--}}
    {{--        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">--}}
    {{--            <div>--}}
    {{--                <h3 class="font-bold text-lg">About Yesim</h3>--}}
    {{--                <p class="text-gray-400">Learn more about our company and services.</p>--}}
    {{--            </div>--}}
    {{--            <div>--}}
    {{--                <h3 class="font-bold text-lg">Help</h3>--}}
    {{--                <ul class="space-y-2">--}}
    {{--                    <li><a href="#" class="text-gray-400 hover:text-white">Support</a></li>--}}
    {{--                    <!-- Add more footer links similarly -->--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--            <div>--}}
    {{--                <h3 class="font-bold text-lg">For Partners</h3>--}}
    {{--                <ul class="space-y-2">--}}
    {{--                    <li><a href="#" class="text-gray-400 hover:text-white">For businesses</a></li>--}}
    {{--                    <!-- Add more footer links similarly -->--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <p class="text-center text-gray-500 mt-4">© 2024 Yesim. All rights reserved.</p>--}}
    {{--    </footer>--}}
</x-app-layout>
