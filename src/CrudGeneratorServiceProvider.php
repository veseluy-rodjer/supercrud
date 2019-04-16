<?php

namespace VeseluyRodjer\CrudGenerator;

use App\Providers\RouteServiceProvider;

class CrudGeneratorServiceProvider extends RouteServiceProvider
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
        parent::boot();

        /*
         * Cоздаем префикс для всех маршрутов и устанавливаем посредника
         * Для корректной работы префикса, класс наследуется от RouteServiceProvider
         */
        Route::prefix(LocaleMiddleware::getLocale())
            ->middleware(LocaleMiddleware::class, 'web')
            ->namespace('App\Http\Controllers')
            ->group(base_path('routes/web.php'));

        //Загружаем свой файл маршрутов после загрузки сервисов
		$this->loadRoutesFrom(__DIR__.'/../roures/route.php');

        $language = LocaleMiddleware::getLocale();
        if($language) Config::set('app.locale', $language);

        $this->publishes([__DIR__ . '/../config/' => config_path() . '/']);
        $this->publishes([__DIR__ . '/../views/' => resource_path() . '/views/locales/']);


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
