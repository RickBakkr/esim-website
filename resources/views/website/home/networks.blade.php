<section class="bg-white">
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="mt-2 text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">
                    {{ trans('homepage.supported_networks') }}
                </h1>
                <p class="mx-auto mt-6 text-pretty text-lg/8 text-gray-600">
                    {{ trans('homepage.supported_networks_description') }}
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 my-10">
            @foreach(getSupportedNetworks() as $networkLogo)
                <div
                    class="flex flex-col justify-center bg-zinc-50 rounded-lg p-6 py-10 relative hover:bg-zinc-100 hover:scale-105 transition-transform duration-300 ease-in-out select-none">
                    <div class="h-8 flex items-center justify-center">
                        <img src="{{ asset('images/networks/' . $networkLogo) }}"
                             class="w-full h-full object-contain">
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
