<?php
namespace SCollins\SteamAuth;
 
use Illuminate\Support\Facades\Facade;
 
class SteamAuthFacade extends Facade {
 
    protected static function getFacadeAccessor() {
        return 'SCollins\SteamAuth\Http\SteamController';
    }
 
}
