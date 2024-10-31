<x-app-layout>


    <div>
        <dl x-data="{ selectedBrand: null }" class="my-10 space-y-6 divide-y divide-white/10">
            @php($i = 0)
            @foreach(config('device-support') as $brand => $models)
                @php($key = $i++)
                <div class="py-4 p-4 bg-white shadow-md rounded-lg">
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
                        <p class="text-base/7 text-gray-300">The next brands:</p>

                        <ul class="list-disc">
                            @foreach($models as $model)
                                <li>{{ $model }}</li>
                            @endforeach
                        </ul>
                    </dd>
                </div>
            @endforeach
        </dl>
    </div>

</x-app-layout>
