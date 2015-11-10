<?php
namespace Scollins\SteamAuth;
 
use Illuminate\Support\Facades\Facade;
 
class SteamAuthFacade extends Facade {
 
    protected static function getFacadeAccessor() {
        return 'Scollins\SteamAuth\Http\Controller\SteamController';
    }
 
}