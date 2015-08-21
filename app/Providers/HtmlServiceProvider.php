<?php namespace Direco\Providers;

use Clay\Bootstrap\Providers\HtmlServiceProvider as BootstrapProvider;
use Direco\Helpers\HtmlBuilder;

class HtmlServiceProvider extends BootstrapProvider {

    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerHtmlBuilder()
    {
        $this->app->bindShared('html', function($app)
        {
            return new HtmlBuilder($app['url']);
        });
    }

}
