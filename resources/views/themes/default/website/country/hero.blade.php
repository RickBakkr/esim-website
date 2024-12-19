@if(isset($backgroundImage))
<img class="aspect-[1/1] w-full flex max-w-lg rounded-xl shadow object-cover lg:max-w-none xl:row-span-2 xl:row-end-2"
     src="{{ $backgroundImage }}"
     title="{{ trans('countries.' . $country->code) }} ({{ $country->code }})"
     alt="{{ trans('countries.' . $country->code) }} ({{ $country->code }})"
>
@endif

@if(isset($country->description))
    <p class="text-gray-800 text-xl mt-6">
        {{ $country->description }}
    </p>
@endif
