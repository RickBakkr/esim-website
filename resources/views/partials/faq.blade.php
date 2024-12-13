<div class="sm:grid sm:grid-cols-5 sm:grid-rows-1 gap-6 @if(!isset($noMargin) || $noMargin == false) mt-20 @endif">
    <div class="sm:col-span-2">
        <h1 class="mt-2 text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ trans('faq-details.faq') }}</h1>
        <p class="mx-auto mt-6 text-pretty text-lg/8 text-gray-600">{{ trans('faq-details.subtitle') }}</p>
    </div>
    <div class="sm:col-span-3">
        <dl class="mt-10 space-y-6">
            @php($i = 0)
            @foreach(trans('faq') as $faq)
                <div x-data="{ open: {{ $i++ == 0 ? 'true' : 'false' }} }"
                     class="pb-6 p-8"
                     :class="{ 'bg-stone-50 rounded-2xl': open }"
                >
                    <dt>
                        <button type="button" x-description="Expand/collapse question button"
                                class="flex w-full items-start justify-between text-left text-gray-900" aria-controls="faq-0"
                                @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                        <span class="text-base font-semibold leading-7">
                            {{ str_replace(':organisationName', config('app.name'), $faq['question']) }}
                        </span>
                            <span class="ml-6 flex h-7 items-center">
                    <svg x-description="Icon when question is collapsed." x-state:on="Item expanded"
                         x-state:off="Item collapsed" class="h-6 w-6" :class="{ 'hidden': open }" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                         data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6"></path>
</svg>
                    <svg x-description="Icon when question is expanded." x-state:on="Item expanded"
                         x-state:off="Item collapsed" class="h-6 w-6 hidden" :class="{ 'hidden': !(open) }" fill="none"
                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                         data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6"></path>
</svg>
                  </span>
                        </button>
                    </dt>
                    <dd class="mt-2 pr-12" id="faq-0" x-show="open" style="display: none;">
                        <p class="text-base leading-7 text-gray-600">
                            {{ str_replace(':organisationName', config('app.name'), $faq['answer']) }}
                        </p>
                    </dd>
                </div>
            @endforeach
        </dl>
    </div>
</div>

