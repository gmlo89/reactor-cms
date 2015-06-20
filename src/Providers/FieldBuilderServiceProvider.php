<?php

namespace Gmlo\CMS\Providers;

use Illuminate\Support\ServiceProvider;
use Gmlo\CMS\FieldBuilder;

class FieldBuilderServiceProvider extends ServiceProvider
{

    protected $file_config;


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['field'] = $this->app->share(function($app)
        {
            $fieldBuilder = new FieldBuilder($app['form'], $app['view'], $app['session.store']);
            return $fieldBuilder;
        });


    }
}
