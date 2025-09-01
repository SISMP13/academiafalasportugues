<?php

return [
    'cookie_key' => '__cookie_consent',
    'cookie_value_analytics' => '2',
    'cookie_value_marketing' => '3',
    'cookie_value_both' => 'true',
    'cookie_value_none' => 'false',
    'cookie_expiration_days' => '365',
    'gtm_event' => 'cookie_refresh',
    'ignored_paths' => ['/bpanel*','/login'],
    'policy_url_es' => env('COOKIE_POLICY_URL_ES', '/legal/politica-de-privacidad'),
];
