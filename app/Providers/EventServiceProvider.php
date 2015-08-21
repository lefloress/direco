<?php namespace Direco\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'Direco\Events\UserWasRegistered' => [
			'Direco\Handlers\Events\EmailRegistrationConfirmation',
		],
	];

}
