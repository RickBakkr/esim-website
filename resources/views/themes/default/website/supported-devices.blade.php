<x-app-layout>
    <section class="bg-white">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="mt-2 text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ trans('device_support.title') }}</h1>
                    <p class="mx-auto mt-6 text-pretty text-lg/8 text-gray-600">{{ trans('device_support.subtitle') }}</p>
                </div>
            </div>

            <div>

                <dl x-data="{ selectedBrand: null }" class="space-y-6 divide-y divide-gray-900/10">
                    @php($i = 0)
                    @foreach(config('device-support') as $brand => $models)
                        @php($key = $i++)
                        <div class="py-4 p-4">
                            <dt>
                                <button type="button" x-description="Expand/collapse question button"
                                        class="flex w-full items-start justify-between text-left " aria-controls="faq-0"
                                        @click="selectedBrand = {{ $key }}">
                            <span class="text-base/7 font-semibold">
                                {{ $brand }}
                            </span>
                                    <span class="ml-6 flex h-7 items-center">
                    <svg x-description="Icon when question is collapsed." x-state:on="Item expanded"
                         x-state:off="Item collapsed" class="h-6 w-6" :class="{ 'hidden': selectedBrand == {{ $key }} }" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                         data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path>
</svg>
                    <svg class="h-6 w-6 hidden" :class="{ 'hidden': selectedBrand != {{ $key }} }" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                         data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path>
</svg>
                  </span>
                                </button>
                            </dt>
                            <dd class="mt-2 pr-12" id="faq-0" x-show="selectedBrand == {{ $key }}" style="display: none;">
                                <p class="text-base/7 mb-4">
                                    {{ trans('device_support.models_below') }}
                                </p>

                                <ul class="list-disc ml-5">
                                    @foreach($models as $model)
                                        <li>{{ $model }}</li>
                                    @endforeach
                                </ul>
                            </dd>
                        </div>
                    @endforeach
                </dl>

            </div>

            <div>
                @include('partials.faq')
            </div>

        </div>
    </section>
</x-app-layout>
