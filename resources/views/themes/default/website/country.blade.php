<x-app-layout>

    <section class="bg-white">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 sm:grid-cols-12 gap-6">
                        <div class="hidden sm:block items-center flex sm:col-span-4">
                            @include('website.country.hero')
                        </div>

                <div class="sm:col-span-8">
                    @include('website.country.products')
                </div>

                <div>
                    @include('website.country.features')
                </div>

                <div>
                    @include('partials.faq', ['noMargin' => true])
                </div>
            </div>
    </section>

</x-app-layout>
