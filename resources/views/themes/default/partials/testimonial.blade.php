<div class="w-96 col-span-2 flex-shrink-0 flex-grow-0 basis-auto md:ml-12 p-8 bg-white rounded-xl shadow border border-slate-50 flex-col justify-start items-start gap-8 inline-flex">
    <div class="self-stretch justify-between items-center inline-flex">
        <div class="justify-start items-center gap-2 flex">
            <p class="text-green-600">
                @for($i = 0; $i < $stars; $i++)
                    ★
                @endfor
            </p>
        </div>
        <div class="justify-start items-center gap-4 flex">
            <div class="w-8 h-8 relative">
                @if(file_exists(public_path('images/flags/' . strtolower($flag) . '.svg')))
                    <img src="{{ asset('images/flags/' . strtolower($flag) . '.svg') }}" alt="{{ trans('countries.' . strtoupper($flag)) }}" class="w-full h-full object-contain">
                @else
                    <img src="{{ asset('images/flags/EU.svg') }}" alt="{{ trans('countries.' . 'EU') }}" class="w-full h-full object-contain">
                @endif
            </div>
            <div class="flex-col justify-start items-start inline-flex">
                <div class="text-slate-600 text-lg font-medium leading-normal">{{ $name }}</div>
            </div>
        </div>
    </div>
    <div class="self-stretch h-32 flex-col justify-start items-start gap-2 flex">
        <div class="self-stretch text-gray-950 text-2xl font-medium leading-loose">
            {{ $shortMessage }}
        </div>
        <div class="self-stretch text-gray-600 text-lg font-normal leading-normal whitespace-normal">{{ $message }}</div>
    </div>
</div>
