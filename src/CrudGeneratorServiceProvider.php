<?php

namespace VeseluyRodjer\CrudGenerator;

use Illuminate\Support\ServiceProvider;

class CrudGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/crudgenerator.php' => config_path('crudgenerator.php'),
            __DIR__ . '/../config/paths.php' => config_path('paths.php'),
            __DIR__ . '/../publish/views/' => base_path('resources/views/'),
            __DIR__ . '/../publish/admin/' => public_path('admin/'),
            __DIR__ . '/../publish/.htaccess' => public_path('.htaccess'),
            __DIR__ . '/stubs/' => base_path('resources/crud-generator/'),
        ]);

		if ($this->app->runningInConsole()) {
	        $this->commands([
	            Commands\CrudCommand::class,
		        Commands\CrudControllerCommand::class,
			    Commands\CrudModelCommand::class,
				Commands\CrudMigrationCommand::class,
	            Commands\CrudViewCommand::class,
		        Commands\CrudLangCommand::class,
			    Commands\CrudApiCommand::class,
				Commands\CrudApiControllerCommand::class,
			]);
		}
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
