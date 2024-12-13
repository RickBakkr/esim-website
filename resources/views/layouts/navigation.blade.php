<nav x-data="{ open: false }" class="bg-neutral-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ getRoute('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-white"/>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="getRoute('home')" :active="request()->routeIs('home')">
                        {{ trans('navigation.home') }}
                    </x-nav-link>
                    <x-nav-link :href="getRoute('supported-devices')" :active="request()->routeIs('supported-devices')">
                        {{ trans('navigation.supported-devices') }}
                    </x-nav-link>
                    <x-nav-link :href="getRoute('destinations')" :active="request()->routeIs('destinations')">
                        {{ trans('navigation.destinations') }}
                    </x-nav-link>
                    <x-nav-link :href="getRoute('about')" :active="request()->routeIs('about')">
                        {{ trans('navigation.about') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @include('partials.currency-nav')

                @include('partials.language-nav')

                <x-nav-link :href="env('MIJN_GOSIM_URL')" target="_blank" class="hover:border-b-0">

                    <button type="button" class="rounded-md bg-red-300 hover:bg-red-500 focus-visible:outline-red-200 px-3 py-1.5 text-sm font-semibold leading-6 text-gray-800 shadow-sm  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 transition ease-in-out duration-150 gap-2 w-full">
                        {{ trans('navigation.portal_link', ['organisationName' => config('app.name')]) }}
                    </button>

                </x-nav-link>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div>
            <x-responsive-nav-link :href="getRoute('home')" :active="request()->routeIs('home')">
                {{ trans('navigation.home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="getRoute('supported-devices')"
                                   :active="request()->routeIs('supported-devices')">
                {{ trans('navigation.supported-devices') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="getRoute('destinations')" :active="request()->routeIs('destinations')">
                {{ trans('navigation.destinations') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="getRoute('about')" :active="request()->routeIs('about')">
                {{ trans('navigation.about') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="env('MIJN_GOSIM_URL')" target="_blank">
                {{ trans('navigation.portal_link', ['organisationName' => config('app.name')]) }}
            </x-responsive-nav-link>

            @include('partials.currency-nav-mobile')

            @include('partials.language-nav-mobile')
        </div>
    </div>
</nav>
