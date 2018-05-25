<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Default admin user
    |--------------------------------------------------------------------------
    |
    | Default user will be created at project installation/deployment
    |
    */
    'admin_first_name' => env('ADMIN_FIRST_NAME', ''),
    'admin_last_name' => env('ADMIN_LAST_NAME', ''),
    'admin_email' => env('ADMIN_EMAIL', ''),
    'admin_password' =>env('ADMIN_PASSWORD', '')
];