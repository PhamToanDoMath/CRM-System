<?php
use App\Postbacks\BuyProductPostback;
use App\Postbacks\CanceledProductPostback;
use App\Postbacks\ConfirmedProductPostback;
use App\Postbacks\WelcomePostback;

return [
    'debug' => env('APP_DEBUG', false),
    'verify_token' => env('MESSENGER_VERIFY_TOKEN'),
    'app_token' => env('MESSENGER_APP_TOKEN'),
    'app_secret' => env('MESSENGER_APP_SECRET'),
    'auto_typing' => true,
    'handlers' => [
        App\Handlers\ShowProductMenuHandler::class
        // Casperlaitw\LaravelFbMessenger\Contracts\DefaultHandler::class
    ],
    'custom_url' => '/webhook',
    'postbacks' => [
        WelcomePostback::class,
        BuyProductPostback::class,
        ConfirmedProductPostback::class,
        CanceledProductPostback::class,
    ],
    'home_url' => [
        'url' => env('MESSENGER_HOME_URL'),
         'webview_share_button' => 'show',
         'in_test' => true,
    ],
];
