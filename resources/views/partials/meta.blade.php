<title>{{ \App\Helpers\SeoHelper::getTitle() ?? config('app.name') }}</title>
<meta name="title" content="{{ \App\Helpers\SeoHelper::getTitle() ?? config('app.name') }}">
<meta name="description" content="{{ \App\Helpers\SeoHelper::getDescription() ?? '' }}">
<meta name="keywords" content="{{ \App\Helpers\SeoHelper::getKeywords() ?? '' }}">

<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ \App\Helpers\SeoHelper::getTitle() ?? config('app.name') }}">
<meta property="og:description" content="{{ \App\Helpers\SeoHelper::getDescription() ?? '' }}">
{{--<meta property="og:image" content="{{ asset('images/og-image.jpg') }}"> <!-- Replace with dynamic image if available -->--}}

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ url()->current() }}">
<meta name="twitter:title" content="{{ \App\Helpers\SeoHelper::getTitle() ?? config('app.name') }}">
<meta name="twitter:description" content="{{ \App\Helpers\SeoHelper::getDescription() ?? '' }}">
{{--<meta name="twitter:image" content="{{ asset('images/og-image.jpg') }}"> <!-- Replace with dynamic image if available -->--}}

<meta name="author" content="{{ env('SEO_AUTHOR') }}">
<meta name="robots" content="index, follow">

@include('partials.jsonld')
