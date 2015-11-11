<?php
Route::get('/'.config('steam.loginUrl', 'steamlogin'), 'SCollins\SteamAuth\Http\SteamController@redirect');