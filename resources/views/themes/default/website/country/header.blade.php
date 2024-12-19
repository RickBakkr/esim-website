<div class="relative bg-cover bg-center h-96 bg-white shadow-lg rounded-lg my-6 overflow-hidden" @if(isset($backgroundImage))style="background-image: url('{{ $backgroundImage }}');"@endif>
    <div class="absolute inset-0 bg-black opacity-40"></div>
    <div class="relative z-10 items-center justify-center h-full text-white text-center">

            <p>
                <img src="{{ asset('/images/flags/' . strtolower($country->code) . '.svg') }}"
                     title="{{ trans('countries.' . $country->code) }} ({{ $country->code }})"
                     alt="{{ trans('countries.' . $country->code) }} ({{ $country->code }})"
                     class="h-32 mb-6"
                >
            </p>

            <h1 class="text-4xl font-bold">
                {{ trans('countries.' . $country->code) }} ({{ $country->code }})
            </h1>
            <p class="text-lg">{{ trans('sales.local_for', ['countryName' => trans('countries.' . $country->code)]) }}</p>
    </div>
</div>
