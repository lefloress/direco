<?php namespace Direco\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * Called before routes are registered.
	 *
	 * Register any model bindings or pattern based filters.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function before(Router $router)
	{
		//
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
        $this->setRoutePatterns($router);

        if(Request::segment(1) == 'admin')
        {
            $this->mapAdminRoutes($router);
        }

        $this->mapUserRoutes($router);
        $this->mapPublicRoutes($router);
	}

    protected function setRoutePatterns($router)
    {
        $router->pattern('section', 'nosotros|servicios|informacion');
        $router->pattern('content', 'noticias|promociones');
    }

    protected function mapAdminRoutes($router)
    {
        $router->group([
            'namespace'   => 'Direco\Http\Controllers\Admin',
            'middleware'  => ['auth', 'admin'],
            'prefix'      => 'admin',
        ], function () use ($router) {
            require app_path('Http/routes/admin.php');
        });
    }

    protected function mapPublicRoutes($router)
    {
        $router->group([
            'namespace' => 'Direco\Http\Controllers'
        ], function () use ($router) {
            require app_path('Http/routes/public.php');
        });
    }

    protected function mapUserRoutes($router)
    {
        $router->group([
            'namespace'   => 'Direco\Http\Controllers',
            'middleware'  => ['auth'],
        ], function () use ($router) {
            require app_path('Http/routes/user.php');
        });
    }

}
