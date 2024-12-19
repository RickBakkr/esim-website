<x-dropdown align="right" width="w-full" alignmentClasses="ltr:origin-top-right rtl:origin-top-left end-0 mt-0 border-t-none" contentClasses="py-1 bg-white max-h-96 overflow-y-auto">
    <x-slot name="trigger">
        <button
            class="block w-full bg-lime-100 ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out flex">
            <div>
                {{ session()->get(config('session.constants.currency'), 'EUR') }}
            </div>

            <div class="ms-1">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                          clip-rule="evenodd"/>
                </svg>
            </div>
        </button>
    </x-slot>

    <x-slot name="content">
        @foreach(App\Models\Currency::all() as $currency)
            <x-dropdown-link :href="getRoute('set-currency', ['currency' => strtolower($currency->code)])">
                {{ $currency->code }}
            </x-dropdown-link>
        @endforeach
    </x-slot>
</x-dropdown>
