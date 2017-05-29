<?php

namespace Forum\Providers;

use Forum\Channel;
use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		View::composer( '*', function ( $view ) {
			$view->with( 'channels', Channel::all() );
		} );
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}
}
