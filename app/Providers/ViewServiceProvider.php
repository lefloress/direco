<?php namespace Direco\Providers;

use Clay\Bootstrap\Facades\Field;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider {

    public function boot()
    {
        if (Request::segment(1) != 'admin')
        {
            Field::setTemplatesDir('components.field');
        }

        View::composer(['register/index', 'users/edit'], 'Direco\Http\ViewComposers\UserForm');
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
}