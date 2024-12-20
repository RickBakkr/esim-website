<?php
return [
    'name' => env('CONTACT_NAME', 'eSIM.tech LTD'),
    'lines' => explode(',', env('CONTACT_ADDRESS', '27 Old Gloucester Street,WC1N 3AX London,United Kingdom')),
    'phone' => env('CONTACT_PHONE', ''),
];
