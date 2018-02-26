<?php

namespace SachinKiranti\Easelog; 

use Illuminate\Support\ServiceProvider;
use SachinKiranti\Easelog\Exceptions\ModelNotFoundException;
use SachinKiranti\Easelog\Observer\EaselogObserver;

class EaselogServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/easelog.php' => config_path('easelog.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/../config/easelog.php', 'easelog');

        if (! class_exists('CreateEaseLogTable')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/../migrations/create_ease_log_table.php.stub' => database_path("/migrations/{$timestamp}_create_ease_log_table.php"),
            ], 'migrations');
        }

        $this->setObservers();

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('easelog', function($app)
        {
            return $this->app->make('SachinKiranti\Easelog\Easelog');
        });
    }

    public function setObservers() 
    {
        if (!config( 'easelog.enable_easelog' )) 
        { return; }

        $namespace = '';

        if (config( 'easelog.use_namespace' ))
        {
            $namespace = config( 'easelog.model_namespace' );
        }
        foreach (config( 'easelog.models' ) as $model)
        {
	        $y = $namespace.$model;
	        $x = new $y();

//        	if (!$x->exists()) {
//        		throw new ModelNotFoundException($y);
//	        }

	        $x->observe(new EaselogObserver);
        }
    }

}