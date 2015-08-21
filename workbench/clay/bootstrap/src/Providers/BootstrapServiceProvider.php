<?php namespace Clay\Bootstrap\Providers;

use Clay\Bootstrap\Alert\AlertWrapper;
use Clay\Bootstrap\Menu\MenuGenerator;
use Clay\Bootstrap\Sort;
use Clay\Bootstrap\FieldBuilder;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class BootstrapServiceProvider extends ServiceProvider {

    public function register()
    {
        $this->registerSort();
        
        $this->registerFieldBuilder();
        
        $this->registerAlertWrapper();
        
        $this->registerMenuGenerator();
        
        $this->setAliases();        
    }
    
    public function registerSort()
    {
        $this->app->bind('sort', function($app)
        {
            return new Sort($app['request'], $app['url'], $app['html'], $app['config'], $app['translator']);
        });
    }
    
    public function registerFieldBuilder()
    {
        $this->app->bind('field', function($app)
        {
           return new FieldBuilder($app['form'], $app['view'], $app['session.store']); 
        });
    }
    
    public function registerAlertWrapper()
    {
        $this->app->bind('alert', function($app)
        {
            return new AlertWrapper($app['session.store'], $app['view'], $app['translator']);
        });
    }
    
    public function registerMenuGenerator()
    {
        $this->app->bind('menu', function($app)
        {
            return new MenuGenerator($app['url'], $app['config'], $app['view'], $app['translator']);
        });
    }

    public function setAliases()
    {
        $this->app->booting(function ()
        {
            $loader = AliasLoader::getInstance();
            // Facades
            $loader->alias('Field', 'Clay\Bootstrap\Facades\Field');
            $loader->alias('Sort',  'Clay\Bootstrap\Facades\Sort');
            $loader->alias('Alert', 'Clay\Bootstrap\Facades\Alert');
            $loader->alias('Menu',  'Clay\Bootstrap\Facades\Menu');
            $loader->alias('Image', 'Clay\Bootstrap\Image');
        });
    }

}