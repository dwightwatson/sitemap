<?php namespace Watson\Sitemap;

use Illuminate\Support\ServiceProvider;

class SitemapServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('sitemap', function($app)
		{
			return new Sitemap($app['config'], $app['cache'], $app['request']);
		});
	}

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
	    /*
		 * If the package method exists, we're using Laravel 4, if not then we're
		 * definitely on laravel 5
		 */
		if (method_exists($this, 'package')) {
			$this->package('watson/sitemap');
		} else {
			$this->publishes([
				__DIR__ . '/../../config/config.php' => config_path('sitemap.php'),
			], 'config');
		}


	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('sitemap');
	}

}