<?php
Route::get('/'.config('steam.loginUrl', 'steamlogin'), 'Scollins\SteamAuth\Http\Controller\SteamController@redirect');