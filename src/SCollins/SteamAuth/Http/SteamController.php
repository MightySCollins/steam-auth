<?php
namespace SCollins\SteamAuth\Http;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;


class SteamController extends Controller {
    
    protected function cURL($url) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));
        $resp = curl_exec($curl);
        curl_close($curl);
        return $resp;
    }

    public function redirect()
    {
        if (empty(config('steam.url'))) {
            $url = $_SERVER['HTTP_HOST'];
        } else {
            $url = config('steam.url');
        }
        $openid = new \SCollins\SteamAuth\LightOpenID($url);
        if (!$openid->mode) {
            $openid->identity = 'http://steamcommunity.com/openid';
            echo $openid->authUrl();
            return redirect($openid->authUrl());
        } elseif ($openid->mode == 'cancel') {
            echo 'cancel auth';
        } else {
            if ($openid->validate()) {
                preg_match("/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/", $openid->identity, $matches);
                $player = json_decode($this->cURL('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . config('steam.api') . '&steamids=' . $matches[1]))->response->players[0];
                Session::put('playerId', $player->steamid);
                Session::put('name', $player->personaname);
                Session::put('avatar', $player->avatarmedium);
                return redirect(config('steam.redirect'));
            }
        }
    }
    
    public function get($playerId)
    {
        return json_decode($this->cURL('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . config('steam.api') . '&steamids=' . $playerId))->response->players[0];
    }
    
    public function signOut()
    {
        Session::forget('playerId');
        Session::forget('name');
        Session::forget('avatar');
        return redirect(config('steam.loginPage'), '/');
    }
}