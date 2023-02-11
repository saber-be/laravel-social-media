<?php

if(! function_exists('getRepository')){
    function getRepository($name){
        $repo = Config::get("repositories.$name");
        return new $repo();
    }
}

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

if (! function_exists('getResponder')) {
    function getResponder($name)
    {
        $device = getAgentDevice();
        $responder = Config::get("responders.$device.$name");
        return new $responder(); 
    }
}