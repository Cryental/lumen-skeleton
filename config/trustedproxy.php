<?php

use Symfony\Component\HttpFoundation\Request;

return [
    'proxies' => [
        // Local Proxy
        '127.0.0.1',
    ],

    'headers' => Request::HEADER_X_FORWARDED_FOR | Request::HEADER_X_FORWARDED_HOST | Request::HEADER_X_FORWARDED_PORT | Request::HEADER_X_FORWARDED_PROTO,
];