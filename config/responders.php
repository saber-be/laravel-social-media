<?php

return [
    'android' => [
        'post' => App\Responders\Android\AndroidPostResponder::class,
        'follower' =>App\Responders\Web\AndroidFollowerResponder::class,
    ],
    'iphone' => [
        'post' => App\Responders\IPhone\IPhonePostResponder::class,
        'follower' =>App\Responders\Web\IPhoneFollowerResponder::class,
    ],
    'web' => [
        'post' => App\Responders\Web\WebPostResponder::class,
        'follower' =>App\Responders\Web\WebFollowerResponder::class,
    ],
];