<?php namespace Direco\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        Validator::resolver(function($translator, $data, $rules, $messages)
        {
            return new \Direco\Support\Validator($translator, $data, $rules, $messages);
        });
	}

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		// This service provider is a great spot to register your various container
		// bindings with the application. As you can see, we are registering our
		// "Registrar" implementation here. You can add your own bindings too!

		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
