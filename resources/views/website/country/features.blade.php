<div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="sm:flex items-center text-center">
        <div class="sm:flex-auto">
            <h1 class="mt-2 text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ trans('features.title', ['countryName' => trans('countries.' . $country->code)]) }}</h1>
            <p class="mx-auto mt-6 text-pretty text-lg/8 text-gray-600">{{ trans('features.subtitle', ['countryName' => trans('countries.' . $country->code)]) }}</p>
        </div>
    </div>
    <div>
        @php($i = 0)
        @foreach(trans('features.features', ['countryName' => trans('countries.' . $country->code)]) as $whyUs)
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 my-10">
                @if($i % 2 === 0)
                    <div>
                        <img class="aspect-[3/2] w-full rounded-2xl object-cover"
                             src="{{ asset($whyUs['image']) }}"
                             alt="{{ $whyUs['title'] }}">
                    </div>
                @endif

                <div class="flex flex-col justify-center h-full">
                    <div class="text-gray-950 text-3xl font-medium leading-10">
                        {{ $whyUs['title'] }}
                    </div>
                    <div class="text-gray-600 text-lg font-normal leading-7">
                        {{ $whyUs['subtitle'] }}
                    </div>
                </div>
                @if($i % 2 !== 0)
                    <div>
                        <img class="aspect-[3/2] w-full rounded-2xl object-cover"
                             src="{{ asset($whyUs['image']) }}"
                             alt="{{ $whyUs['title'] }}">
                    </div>
                @endif
            </div>
            @php($i++)
        @endforeach
    </div>
</div>
