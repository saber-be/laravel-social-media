<?php

if (! function_exists('getAgentDevice')) {
    function getAgentDevice(): string
    {
        // check if device is android, iphone, or web
        $device = Request()->header('User-Agent');
        if (strpos($device, 'Android') !== false) {
            return 'android';
        } elseif (strpos($device, 'iPhone') !== false) {
            return 'iphone';
        } else {
            return 'web';
        }
        
    }
}