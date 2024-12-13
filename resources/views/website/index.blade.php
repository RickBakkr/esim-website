<x-app-layout>

    @include('website.home.hero')

    @include('website.home.popular_destinations')

    @include('website.home.how_it_works')

    @include('website.home.testimonials')

    @include('website.home.networks')

    @include('website.home.faq')

{{--    <!-- How It Works -->--}}
{{--    <section class="my-8">--}}
{{--        <h3 class="text-xl font-bold mb-4">{{ trans('homepage.how_it_works') }}</h3>--}}
{{--        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">--}}
{{--            @foreach(trans('homepage.steps') as $key => $step)--}}
{{--                <div class="p-4 bg-white shadow-md rounded-lg">--}}
{{--                    <h4 class="font-bold mb-2">--}}
{{--                        {{ $step['title'] }}--}}
{{--                    </h4>--}}
{{--                    <p>--}}
{{--                        {{ $step['description'] }}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </section>--}}
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
