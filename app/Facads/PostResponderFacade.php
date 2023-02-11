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
        $device = getAgentDevice();
        return Config::get("responders.$device.post", App\Responder\WebPostResponder::class); 
    }

}
