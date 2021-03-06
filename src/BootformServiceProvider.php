<?php
namespace BlueMountainTeam\Bootform;

use Illuminate\Support\ServiceProvider;

class BootformServiceProvider extends ServiceProvider
{
    public function boot()
    {
        //AliasLoader::getInstance()->alias('BootForm',BootForm::class);
    }

    public function register()
    {
        $this->app->bind('bootform', function ($app) {
            return new BootForm($app['form'], $app['session']);
        });
        // Allow configuration to be publishable.
        $this->publishes([
            __DIR__.'/Config/config.php' => config_path('bootform.php'),
        ], 'config');

        // Pictures for inputLang publishes in public/ressources/assets
        $this->publishes([
            __DIR__.'/ressources/assets/img/flags/' => base_path('/public/assets/vendor/img/flags/'),
        ], 'assets');
        $this->publishes([
            __DIR__.'/ressources/assets/js/' => base_path('/public/assets/vendor/js/'),
        ], 'assets');

        $this->publishes([
            __DIR__.'/ressources/assets/css/' => base_path('/public/assets/vendor/css/'),
        ], 'assets');

        // Include the helpers file for global hashid encoding `c` and 'd' functions
        include __DIR__.'/helpers_bootform.php';

    }

    public function provides()
    {
        return ['bootform'];
    }
}