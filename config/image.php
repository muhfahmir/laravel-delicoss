<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',
    'max_width' => 600,

    'max_width_thumb' => 500,
    'thumb'=>300,
    'product' => [
        'path' => public_path('/image/product/'), 
    ],

    'user' => [
        'path' => public_path('image/user/'),
    ],
    'transaction' => [
        'path' => public_path('image/transaction/'),
    ],
];
