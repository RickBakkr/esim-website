<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('partials.meta')

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Rubik:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-MHGQPXWK');</script>
        <!-- End Google Tag Manager -->
        
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            <x-banner>
                <a>
                    @php($i = 0)
                    @php($count = count(trans('banner-features')))
                    @foreach(trans('banner-features') as $feature)
                        <span class="text-sm text-white">{{ $feature }}</span>

                        @if($i++ < $count-1)
                        <svg viewBox="0 0 2 2" class="mx-2 inline size-0.5 fill-current" aria-hidden="true"><circle cx="1" cy="1" r="1" /></svg>
                        @endif
                    @endforeach
                </a>
            </x-banner>

            @include('layouts.navigation')

            @isset($header)
                {{ $header }}
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('partials.footer')
        </div>

        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MHGQPXWK"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    </body>
</html>
