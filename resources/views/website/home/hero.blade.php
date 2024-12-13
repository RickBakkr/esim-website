<div class="relative isolate bg-red-500">
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
            <h1 class="max-w-2xl text-balance text-5xl tracking-tight text-white sm:text-6xl lg:col-span-2 xl:col-auto">
                {{ trans('homepage.title') }}
            </h1>
            <div class="mt-6 max-w-xl lg:mt-0 xl:col-end-1 xl:row-start-1">
                <p class="text-pretty text-lg font-medium text-gray-200 sm:text-xl/8">
                    {{ trans('homepage.subtitle') }}
                </p>

                <div class="container mx-auto my-10">

                    <div class="relative w-full">
                        <div id="inputHolderBox" class="w-full px-6 py-4 bg-white rounded-2xl shadow justify-start items-center gap-2.5 inline-flex">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 relative text-neutral-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </div>
                            <div class="grow shrink basis-0 text-neutral-400 text-base font-normal leading-normal">
                                <input type="text" class="w-full bg-transparent border-0" placeholder="{{ trans('sales.choose_destination') }}" oninput="showSuggestions(this.value)" onclick="showSuggestionsOnClick()" id="autocompleteInput">
                            </div>
                        </div>
                        <ul id="suggestions" class="absolute w-full bg-white rounded-b-2xl shadow hidden z-10">
                            <!-- Suggestions will be dynamically inserted here -->
                        </ul>
                    </div>

                </div>

                <div class="mt-10 flex items-center gap-x-6">
                    <a href="{{ getRoute('destinations') }}" class="bg-red-300 hover:bg-red-500 focus-visible:outline-red-200 rounded-md px-3.5 py-2.5 text-sm font-semibold text-gray-800 shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2">
                        {{ trans('homepage.see_all_destinations') }}
                    </a>
{{--                    <a href="#" class="text-sm/6 font-semibold text-white">Learn more <span aria-hidden="true">→</span></a>--}}
                </div>

            </div>

            <div class="absolute right-0 top-0 h-full select-none hidden sm:block">
                <img src="{{ asset('/images/esim-nlo.webp') }}" alt="Afbeelding" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-red-500 via-transparent to-transparent"></div>
            </div>

{{--            <img src="{{ asset('/images/people.png') }}" alt="" class="mt-10 aspect-[6/5] w-full max-w-lg rounded-2xl object-cover sm:mt-16 lg:mt-0 lg:max-w-none xl:row-span-2 xl:row-end-2 xl:mt-36 select-none">--}}
        </div>
    </div>
</div>

<script>
    let inputHolderBox = document.getElementById('inputHolderBox');

    const suggestionsData = {!! json_encode(countrySuggestions()) !!}

    // Function to display suggestions with flags
    function showSuggestions(value) {
        const suggestionsBox = document.getElementById('suggestions');
        const filteredSuggestions = suggestionsData.filter(item =>
            item.name.toLowerCase().includes(value.toLowerCase()) || item.englishName.toLowerCase().includes(value.toLowerCase())
        );

        if (filteredSuggestions.length > 0 && filteredSuggestions.length < 16) {
            suggestionsBox.innerHTML = filteredSuggestions
                .map(
                    item => `
                <li class="flex items-center px-4 py-2 hover:bg-gray-200 cursor-pointer" onclick="selectSuggestion('${item.name}', '${item.link}')">
                    <img src="${item.flag}" alt="${item.name}" class="w-6 h-6 rounded-full mr-2 object-contain">
                    <span>${item.name}</span>
                </li>`
                )
                .join('');
            suggestionsBox.classList.remove('hidden');

            inputHolderBox.classList.add('rounded-b-none');
        } else {
            suggestionsBox.innerHTML = `<li class="px-4 py-2 text-gray-500">No suggestions found</li>`;
        }
    }

    function showSuggestionsOnClick() {
        showSuggestions('');
    }

    function selectSuggestion(name, link) {
        document.getElementById('autocompleteInput').value = name;
        document.getElementById('suggestions').classList.add('hidden');
        inputHolderBox.classList.remove('rounded-b-none');

        // Redirect to the selected country
        document.location.href = link;
    }

    // Close the dropdown when clicking outside
    document.addEventListener('click', function (event) {
        const input = document.getElementById('autocompleteInput');
        const suggestionsBox = document.getElementById('suggestions');

        if (!input.contains(event.target) && !suggestionsBox.contains(event.target)) {
            suggestionsBox.classList.add('hidden');
            inputHolderBox.classList.remove('rounded-b-none');
        }
    });

</script>
