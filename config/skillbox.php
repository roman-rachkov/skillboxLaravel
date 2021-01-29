<?php
return [
    'admin_email' => env('ADMIN_EMAIL', ''),
    'push_all' => [
        'api_key' => env('PUSH_ALL_KEY', ''),
        'api_id' => env('PUSH_ALL_ID', ''),
    ],
    'results_per_page' => env('RESULTS_PER_PAGE', 15),
];
