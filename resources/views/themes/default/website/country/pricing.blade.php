{{--<div class="self-stretch text-gray-950 text-2xl font-medium leading-loose">--}}
{{--    {{ trans('sales.local_for', ['countryName' => trans('countries.' . $country->code)]) }}--}}
{{--</div>--}}
<div class="justify-start items-start gap-2 w-full">

    @php
    use App\Models\Currency;$minPrice = null;
    $highestPrice = null;

    foreach($plans as $plan) {
        if($minPrice == null || $plan['price_eur'] < $minPrice) {
            $minPrice = $plan['price_eur'];
        }
        if($highestPrice == null || $plan['price_eur'] > $highestPrice) {
            $highestPrice = $plan['price_eur'];
        }
    }

    if(is_null($minPrice)) {
        $minPrice = 0.00;
    }

    if(is_null($highestPrice)) {
        $highestPrice = 0.00;
    }

    $currency = session()->get(config('session.constants.currency'), 'EUR');
    if($minPrice > 0 && $currency !== 'EUR') {
        // convert to currency
        $minPrice = Currency::getPriceInCurrency($minPrice, $currency);
    }
    if($highestPrice > 0 && $currency !== 'EUR') {
        // convert to currency
        $highestPrice = Currency::getPriceInCurrency($highestPrice, $currency);
    }

    @endphp

    <script type="application/ld+json">
            {"@type":"Product","aggregateRating":{"@type":"AggregateRating","ratingValue":"4.5","bestRating":"5","worstRating":"1","reviewCount":"276"},"offers":{"@type":"AggregateOffer","offerCount":{{ count($plans) }},"url":"{{ url(request()->getRequestUri()) }}","priceCurrency":"{{ session()->get(config('session.constants.currency'), 'EUR') }}","availability":"OnlineOnly","lowPrice":{{ number_format($minPrice, 2, '.', '') }},"highPrice":{{ number_format($highestPrice, 2, '.', '') }}}
    </script>

    @if(count($plans) > 0)
    @php($topPlanSet = false)
    @foreach($plans as $plan)
        @php($random = rand(10000, 100000))
        <div
            class="w-full p-4 mb-1 bg-white rounded-xl shadow border flex-col justify-start items-start gap-3.5 flex cursor-pointer"
            x-on:click="id = '{{ $plan['id'] }}'">
            <div class="self-stretch justify-start items-start gap-3.5 inline-flex">
                <div class="grow shrink basis-0 flex-col justify-start items-start gap-1 inline-flex">
                    <div class="self-stretch justify-start items-center gap-1 inline-flex">
                        <div class="text-[] text-md font-medium leading-tight">
                            {{ $plan['name'] }} - {{ $plan['days_valid'] }} {{ trans('sales.days') }}
                        </div>
                        @if(!$topPlanSet && $plan['price_eur'] > 10)
                            @php($topPlanSet = true)
                            <div
                                class="px-2 py-0.5 bg-red-200 rounded-[999px] justify-center items-center flex ml-2">
                                <div
                                    class="text-center text-red-500 text-[11px] font-medium uppercase leading-3 tracking-tight">
                                    {{ trans('sales.top_plan') }}
                                </div>
                            </div>
                        @endif
                    </div>
{{--                    <div--}}
{{--                        class="self-stretch text-gray-600 text-xs font-normal leading-none">{{ $plan['price'] }}--}}
{{--                        / {{ $plan['days_valid'] }} {{ trans('sales.days') }}</div>--}}
                </div>
                <div class="text-gray-950 text-md font-medium leading-tight">{{ $plan['price'] }}</div>
            </div>

            <div x-show="id === '{{ $plan['id'] }}'" class="w-full">

                <div class="my-4 flex-col justify-start items-start gap-2">
                    <div class="text-gray-950 text-sm font-medium leading-tight">
                        {{ trans('sales.all_features') }}
                    </div>
                    <div class="flex-col justify-start items-start gap-3 flex mt-4">
                        <div class="justify-start items-center gap-2 inline-flex">
                            <div class="w-4 h-4 relative">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.288 15.038a5.25 5.25 0 0 1 7.424 0M5.106 11.856c3.807-3.808 9.98-3.808 13.788 0M1.924 8.674c5.565-5.565 14.587-5.565 20.152 0M12.53 18.22l-.53.53-.53-.53a.75.75 0 0 1 1.06 0Z" />
                                </svg>
                            </div>
                            <div class="text-gray-600 text-xs font-normal leading-none">
                                <p>{{ trans('sales.features.feature_one') }}</p>
                            </div>
                        </div>
                        <div class="justify-start items-center gap-2 inline-flex">
                            <div class="w-4 h-4 relative">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4">
                                    <rect x="6" y="2" width="12" height="20" rx="2" ry="2" stroke="currentColor"></rect>
                                    <path d="M9 8h6v8H9z"></path>
                                    <path d="M9 14h2v2H9zM13 14h2v2h-2zM9 10h2v2H9zM13 10h2v2h-2z"></path>
                                </svg>
                            </div>
                            <div class="text-gray-600 text-xs font-normal leading-none">
                                <p>{{ trans('sales.features.feature_two') }}</p>
                                <p class="mt-2">
                                    @php($roamingNetworks = config('roaming-networks.' . strtoupper($country->code)))
                                    @php($roamingNetworks = $roamingNetworks ?? [])
                                    @foreach($roamingNetworks as $network)
                                        <a href="{{ $network['link'] }}" target="_blank" class="text-red-800 hover:text-red-500 pr-4">
                                            {{ $network['name'] }}
                                        </a>
                                    @endforeach
                                </p>
                            </div>
                        </div>
                        <div class="justify-start items-center gap-2 inline-flex">
                            <div class="w-4 h-4 relative">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
                                </svg>
                            </div>
                            <div class="text-gray-600 text-xs font-normal leading-none">
                                {{ trans('sales.features.feature_three') }}
                            </div>
                        </div>
                    </div>
                </div>

                <a href="{{ $plan['link'] }}" target="_blank">
                    <button type="button" class="w-full rounded-md bg-red-500 hover:bg-red-300 focus-visible:outline-red-200 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
                    {{ trans('sales.buy_now') }}
                    </button>
                </a>

            </div>
        </div>
    @endforeach
    @else
        <div class="rounded-md bg-yellow-50 p-4">
            <div class="flex">
                <div class="shrink-0">
                    <svg class="size-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495ZM10 5a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5A.75.75 0 0 1 10 5Zm0 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">
                        {{ trans('sales.not_available_yet_contact_us') }}
                    </h3>
                </div>
            </div>
        </div>
    @endif
</div>
