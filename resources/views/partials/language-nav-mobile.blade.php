<x-dropdown align="right" width="48">
    <x-slot name="trigger">
        <button
            class="block w-full bg-lime-100 ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out flex">

            <div>{{ config('languages')[app()->getLocale()]['emoji'] }}</div>

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
        @foreach(getLanguages() as $code => $language)
            <x-dropdown-link :href="getRoute(request()->route()->getName(), request()->route()->parameters(), $language)">
                {{ $language }}
            </x-dropdown-link>
        @endforeach
    </x-slot>
</x-dropdown>
