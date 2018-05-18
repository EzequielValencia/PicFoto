<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */

    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['X-Requested-With', 'Content-Type', 'Origin', 'Authorization', 'Accept', 'Client-Security-Token', 'Accept-Encoding'],
    'allowedMethods' => ['POST', 'GET', 'OPTIONS', 'DELETE', 'PUT'],
    'exposedHeaders' => [],
    'maxAge' => 0,
    'hosts' => ['*'],
];
