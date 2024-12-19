<section class="bg-red-500">
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-20">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="mt-2 text-4xl font-semibold tracking-tight text-white sm:text-5xl">
                    {{ trans('homepage.user_reviews') }}
                </h1>
                <p class="mx-auto mt-6 text-pretty text-lg/8 text-white">
                    {{ trans('homepage.user_reviews_subtitle') }}
                </p>
            </div>
        </div>

    </div>
    <div class="pt-6 pb-20">

        @php($reviews = getRandomReviews(16))
        @php($oddReviews = array_filter($reviews, function($key) {
            return $key % 2 !== 0;
        }, ARRAY_FILTER_USE_KEY))
        @php($evenReviews = array_filter($reviews, function($key) {
            return $key % 2 === 0;
        }, ARRAY_FILTER_USE_KEY))

        @php($oddReviews = $reviews)

        <div class="overflow-hidden relative mt-8">
            <div class="overflow-hidden">
                <div class="inline-grid grid-flow-col gap-6 whitespace-nowrap animate-scroll w-[200%]" id="testimonialsTop">
                    <div class="flex">
                        @foreach($oddReviews as $review)
                            @include('partials.testimonial', [
                                'name' => $review['name'],
                                'shortMessage' => $review['short_message'],
                                'flag' => $review['flag'],
                                'stars' => $review['stars'],
                                'message' => $review['message'],
                            ])
                        @endforeach
                            @foreach($oddReviews as $review)
                                @include('partials.testimonial', [
                                    'name' => $review['name'],
                                    'shortMessage' => $review['short_message'],
                                    'flag' => $review['flag'],
                                    'stars' => $review['stars'],
                                    'message' => $review['message'],
                                ])
                            @endforeach
                    </div>
                </div>
            </div>
        </div>

{{--        <div class="overflow-hidden relative mt-16">--}}
{{--            <div class="overflow-hidden">--}}
{{--                <div class="inline-grid grid-flow-col gap-6 whitespace-nowrap" id="testimonialsBottom">--}}

{{--                    <div class="col-span-1 w-48">--}}
{{--                        &nbsp;--}}
{{--                    </div>--}}

{{--                @php($count = 0)--}}
{{--                @foreach($evenReviews as $review)--}}
{{--                    @php($count++)--}}
{{--                    @include('partials.testimonial', [--}}
{{--                        'name' => $review['name'],--}}
{{--                        'shortMessage' => $review['short_message'],--}}
{{--                        'flag' => $review['flag'],--}}
{{--                        'stars' => $review['stars'],--}}
{{--                        'message' => $review['message'],--}}
{{--                        'indent' => $count == 1--}}
{{--                    ])--}}
{{--                @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
</section>
