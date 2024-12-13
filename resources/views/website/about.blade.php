<x-app-layout>
    <section class="bg-white">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="items-center">
                <div class="flex-auto text-center">
                    <h1 class="text-center mt-2 text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ trans('about.title') }}</h1>
                    <p class="text-center mx-auto mt-6 text-pretty text-lg/8 text-gray-600">{{ trans('about.subtitle') }}</p>
                </div>
                <div class="flex-auto mt-6 flex items-center">
                    <img src="{{ asset('/images/aboutus.png') }}"
                         class="aspect-[16/9] h-1/2 max-w-full rounded-xl shadow object-cover xl:row-span-2 xl:row-end-2 mx-auto"
                         >
                </div>
            </div>
        </div>

        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="mt-2 text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ trans('about.why_us') }}</h1>
                    <p class="mx-auto mt-6 text-pretty text-lg/8 text-gray-600">{{ trans('about.why_us_subtitle') }}</p>
                </div>
            </div>
            <div>
                @php($i = 0)
                @foreach(trans('about.why_us_reasons') as $whyUs)
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 my-10">
                        @if($i % 2 === 0)
                            <div>
                                <img class="aspect-[3/2] w-full rounded-2xl object-cover select-none"
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
                                <img class="aspect-[3/2] w-full rounded-2xl object-cover select-none"
                                     src="{{ asset($whyUs['image']) }}"
                                     alt="{{ $whyUs['title'] }}">
                            </div>
                        @endif
                    </div>
                    @php($i++)
                @endforeach
            </div>
        </div>

        @include('partials.how_it_works')

        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto lg:mx-0">
                <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                    {{ trans('about.our_team') }}
                </h2>
                <p class="mt-6 mb-6 text-lg/8 text-gray-600">
                    {{ trans('about.our_team_subtitle') }}
                </p>
            </div>
            <ul role="list"
                class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 lg:col-span-3">
                @foreach(trans('team') as $name => $details)
                    <li>
                        <div class="flex items-center gap-x-6">
                            <img class="size-16 rounded-full" src="{{ asset($details['image']) }}" alt="{{ $name }}">
                            <div>
                                <h3 class="text-base/7 font-semibold tracking-tight text-gray-900">{{ $name }}</h3>
                                <p class="text-sm/6 font-semibold text-indigo-600">{{ $details['role'] }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

    </section>
</x-app-layout>
