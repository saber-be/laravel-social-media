<?php

namespace App\Facads;

use App\Repositories\UserProfileRepository;
use Illuminate\Http\Request;

// import laravel facade 
use Illuminate\Support\Facades\Facade;

use Config;
class PostResponderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        $device = PostResponderFacade::getAgentDevice();
        return Config::get("deviceProviders.$device.post", App\Responder\WebPostResponder::class); 
    }

    public static function getAgentDevice(): string
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
