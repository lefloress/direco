<?php namespace Clay\Bootstrap\Providers;

use Clay\Bootstrap\FormBuilder;
use Clay\Bootstrap\HtmlBuilder;
use Collective\Html\HtmlServiceProvider as ServiceProvider;

class HtmlServiceProvider extends ServiceProvider {

    /**
     * Register the form builder instance.
     *
     * @return void
     */
    protected function registerFormBuilder()
    {
        $this->app['form'] = $this->app->share(function($app)
        {
            $form = new FormBuilder(
                $app['html'],
                $app['url'],
                $app['session.store']->getToken()
            );

            $form->setNovalidate(
                $app['config']->get('view.form.novalidate', false)
            );

            return $form->setSessionStore($app['session.store']);
        });
    }

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