# Laravel 5.1 Steam Login
[![Latest Stable Version](https://poser.pugx.org/scollins/steam-auth/v/stable)](https://packagist.org/packages/scollins/steam-auth)
[![Total Downloads](https://poser.pugx.org/scollins/steam-auth/downloads)](https://packagist.org/packages/scollins/steam-auth)
[![License](https://poser.pugx.org/scollins/steam-auth/license)](https://packagist.org/packages/scollins/steam-auth)
[![Monthly Downloads](https://poser.pugx.org/scollins/steam-auth/d/monthly)](https://packagist.org/packages/scollins/steam-auth)

This package redirects user to steam and returns with user information.

The user will be redirected to the steam login page, if they are able to sucsessfully login the folowing details are stored in the session:
   - playerId
   - name
   - avatar (Current 64x64)

## How to use
Grab the package with `composer require scollins/steam-auth`

Add to your services ``

You can even made a Facade ``

Then publish the config files `php artisan vendor:publish`

Fill in the details at /config/steam.php


Redirect user to /steamlogin and they should login