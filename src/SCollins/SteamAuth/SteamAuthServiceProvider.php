<?php
namespace SCollins\SteamAuth;

use Illuminate\Support\ServiceProvider;

class SteamAuthServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		if (! $this->app->routesAreCached()) {
	        require __DIR__.'/Http/routes.php';
	    }
	    require __DIR__.'/Classes/LightOpenID.php';
	    
	    $this->publishes([
	        __DIR__.'/Config/steam.php' => config_path('steam.php'),
	    ]);
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}
