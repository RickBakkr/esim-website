<div class="bg-white rounded-3xl p-8 ring-1 @if($plan['active']) ring-indigo-600 @else ring-gray-200 @endif">
    <h3 class="text-lg font-semibold leading-8 @if($plan['active']) text-indigo-600 @else text-gray-900 @endif">
        {{ $plan['name'] }}
    </h3>
{{--    <p class="mt-4 text-sm leading-6 text-gray-600">The essentials to provide your best work for clients.</p>--}}
    <p class="mt-6 flex items-baseline gap-x-1">
        <span class="text-2xl font-semibold tracking-tight text-gray-900">
            {{ $plan['price'] }}
        </span>

        <span class="text-sm font-semibold leading-6 text-gray-600">/ {{ $plan['days_valid'] }} {{ trans('sales.days') }}</span>
    </p>
    @if($plan['active'])
        <a href="{{ $plan['link'] }}" class="mt-6 block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ trans('sales.buy_plan') }}</a>
    @else
        <a href="{{ $plan['link'] }}" class="mt-6 block rounded-md px-3 py-2 text-center text-sm font-semibold leading-6 text-indigo-600 ring-1 ring-inset ring-indigo-200 hover:ring-indigo-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ trans('sales.buy_plan') }}</a>
    @endif
    <ul role="list" class="mt-8 space-y-3 text-sm leading-6 text-gray-600">
        @foreach(trans('sales.perks') as $salesPerk)
            <li class="flex gap-x-3">
                <svg class="h-6 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" />
                </svg>
                {{ $salesPerk }}
            </li>
        @endforeach
    </ul>
</div>
