<?php

return [
    'android' => [
        'post' => App\Responders\Android\AndroidPostResponder::class,
    ],
    'iphone' => [
        'post' => App\Responders\IPhone\IPhonePostResponder::class,
    ],
    'web' => [
        'post' => App\Responders\Web\WebPostResponder::class,
    ],
];