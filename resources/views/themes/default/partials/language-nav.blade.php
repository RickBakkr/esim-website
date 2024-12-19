@php($languages = getLanguages())
@if(count($languages) > 1)
<x-dropdown align="right" width="w-64" contentClasses="py-1 bg-white max-h-96 overflow-y-auto">
    <x-slot name="trigger">
        <button
            class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md text-gray-100 hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">

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
        @foreach($languages as $code => $language)
            <x-dropdown-link :href="getRoute(request()->route()->getName(), request()->route()->parameters(), $code)">
                {{ $language }}
            </x-dropdown-link>
        @endforeach
    </x-slot>
</x-dropdown>
@endif
