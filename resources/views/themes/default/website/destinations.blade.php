<x-app-layout>
    <section class="bg-white">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="mt-2 text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ trans('destinations.title') }}</h1>
                    <p class="mx-auto mt-6 text-pretty text-lg/8 text-gray-600">{{ trans('destinations.subtitle') }}</p>
                </div>
            </div>

            <div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 my-10">

                    @foreach($destinations as $destination)
                        <a href="{{ getRoute('esim-bundle-per-country', ['countryCode' => $destination, 'slug' => slug(trans('countries.' . strtoupper($destination)))]) }}">
                            <div class="flex flex-col justify-center bg-zinc-50 rounded-lg p-6 relative hover:bg-zinc-100 hover:scale-105 transition-transform duration-300 ease-in-out">
                                <div class="w-8 h-8 flex items-center justify-center">
                                    <img src="{{ asset('/images/flags/' . strtolower($destination) . '.svg') }}" alt="{{ trans('countries.' . strtoupper($destination)) }}" class="w-full h-full object-contain">
                                </div>
                                <p class="mt-4 text-lg font-semibold text-gray-800">{{ trans('countries.' . strtoupper($destination)) }}</p>
                                <p class="text-sm text-gray-500">{{ trans('sales.starting_from') }}</p>
                                <p class="mt-2 text-lg font-bold text-gray-900 absolute bottom-6 right-6">{{ trans('homepage.from', ['price' => formatPrice(App\Models\EsimBundle::getFromPerGbPriceForCountry($destination))]) }}</p>
                            </div>
                        </a>
                    @endforeach

                </div>

            </div>

            <div>
                @include('partials.faq')
            </div>

        </div>
    </section>
</x-app-layout>
