<script type="application/ld+json">
 {
 "@context": "http://schema.org",
 "@type": "Organization",
 "name": "{{ config('app.name') }}",
 "legalName" : "ESIM TECH LTD",
 "url": "https://{{request()->getHttpHost()}}",
 "foundingDate": "2022",
 "address" :  {
    "@type" : "PostalAddress",
    "streetAddress" : "27 Old Gloucester Street",
    "addressLocality" : "London",
    "postalCode" : "WC1N 3AX",
    "addressCountry" : {
        "@type" : "Country",
        "name" : "UK"
     }
 }
 }

 @yield('additionalJsonLd')
</script>
