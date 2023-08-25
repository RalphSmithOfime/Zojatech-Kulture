<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['POST', 'GET', 'DELETE', 'PUT', 'OPTIONS', '*'],

    'allowed_origins' => [
        'https://kulture-lac.vercel.app/',
        'https://zojatech-kulture.netlify.app/',
        'http://127.0.0.1:5174/',
        'http://127.0.0.1:5173/',
        'exp://172.20.10.4:19000',
        'http://172.20.10.4:19000',
        'exp://172.20.10.4:19001',
        'http://172.20.10.4:19001',
        'http://localhost:5173',
        'http://localhost:19006' .
            '*'
    ],

    'allowed_origins_patterns' => ['*'],

    'allowed_headers' => [
        'X-Custom-Header',
        'Upgrade-Insecure-Requests',
        'X-PINGOTHER',
        'Content-Type',
        'Origin, X-Requested-With, Content-Type, Accept',
        '*'
    ],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,


];
