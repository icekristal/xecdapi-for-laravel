<?php
return [
    'is_enable' => env('XECD_IS_ENABLE', false),

    'api_version' => env('XECD_API_VERSION', 'v1'),
    'is_enable_log' => env('XECD_IS_ENABLE_LOG', false),
    'log_channel' => env('XECD_LOG_CHANNEL', 'daily'),
];
