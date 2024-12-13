@if(isset($plans[0]) && isset($plans[0]['id']))
    <div x-data="{ id: '{{ $plans[0]['id'] }}' }">
        @else
            <div x-data="{ id: null }">
                @endif

                <div class="justify-start items-center gap-8">
                    <div class="self-stretch py-2 justify-start items-start gap-2.5 flex min-w-10 mb-6">
                        <div class="relative flex items-center gap-x-4">
                            <img
                                src="{{ asset('/images/flags/' . strtolower($country->code) . '.svg') }}"
                                title="{{ trans('countries.' . $country->code) }} ({{ $country->code }})"
                                alt="{{ trans('countries.' . $country->code) }} ({{ $country->code }})"
                                class="h-9"
                            >

                            <div>
                                <p class="text-gray-950 text-2xl font-medium ml-4">
                                    {{ trans('sales.local_for', ['countryName' => trans('countries.' . $country->code)]) }}
                                </p>

                                <p class="text-gray-800 text-md ml-4">
                                    {{ trans('sales.sub_description', ['countryName' => trans('countries.' . $country->code)]) }}
                                </p>
                            </div>
                        </div>
                    </div>
{{--                    class="flex-col justify-start items-start gap-2 inline-flex"--}}
                    <div>
{{--                        <div class="self-stretch text-black text-4xl font-medium leading-10">--}}
{{--                            {{ trans('countries.' . $country->code) }}--}}
{{--                        </div>--}}
{{--                        <div--}}
{{--                            class="self-stretch text-gray-600 text-lg font-normal leading-normal hidden sm:block">--}}
{{--                            {{ $country->description }}--}}
{{--                        </div>--}}

                        <div class="w-full">
                            @include('website.country.pricing')
                        </div>
                    </div>
                </div>
            </div>
    </div>
