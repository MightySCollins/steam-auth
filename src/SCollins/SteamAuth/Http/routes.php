<?php
Route::get('/'.config('steam.loginUrl', 'steamlogin'), 'SCollins\SteamAuth\Http\SteamController@redirect');
Route::get('steamlogout', 'SCollins\SteamAuth\Http\SteamController@signOut');