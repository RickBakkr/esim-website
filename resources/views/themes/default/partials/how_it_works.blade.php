<div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="mt-2 text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">{{ trans('sales.how_esim_works.title') }}</h1>
            <p class="mx-auto mt-6 mb-6 text-pretty text-lg/8 text-gray-600">{{ trans('sales.how_esim_works.subtitle') }}</p>
        </div>
    </div>
    <div>

        <div x-data="{step: 0}" class="justify-start items-center gap-16 inline-flex">
            <div class="grow shrink basis-0 flex-col justify-start items-start inline-flex">

                @foreach(trans('sales.how_esim_works.steps') as $index => $step)
                <div
                    x-on:click="step = {{ $index }}"
                    :class="step == {{ $index }} ? 'border-gray-950' : 'border-slate-50'"
                    class="self-stretch h-32 pl-6 py-6 border-l-none sm:border-l-4 border-gray-950 flex-col justify-start items-start gap-5 flex cursor-pointer">
                    <div class="self-stretch h-20 flex-col justify-start items-start gap-2 flex">
                        <div class="text-gray-950 text-xl font-medium leading-7 tracking-tight">
                            {{ $step['title'] }}
                        </div>
                        <div class="self-stretch text-gray-600 text-base font-normal leading-normal">
                            {{ $step['description'] }}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <div class="pl-12 py-12 rounded-3xl justify-end items-center flex hidden sm:block">
                <div class="max-w-96 max-h-96 relative">
                @foreach(trans('sales.how_esim_works.steps') as $index => $step)
                    <img x-show="step == {{ $index }}" class="" src="{{ asset($step['image']) }}" class="rounded-lg border-4 border-gray-900" />
                @endforeach
                </div>
            </div>
        </div>


    </div>
</div>
