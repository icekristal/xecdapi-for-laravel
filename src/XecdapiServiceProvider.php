<?php
namespace Icekristal\XecdapiForLaravel;

use Icekristal\XecdapiForLaravel\Services\XecdapiService;
use Illuminate\Support\ServiceProvider;

class XecdapiServiceProvider extends ServiceProvider
{

    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind('ice.xecdapi_service', XecdapiService::class);
        $this->registerConfig();
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishConfigs();
        }

    }

    /**
     * @return void
     */
    protected function publishConfigs(): void
    {
        $this->publishes([
            __DIR__ . '/../config/xecdapi.php' => config_path('xecdapi.php'),
        ], 'config');
    }

    /**
     * @return void
     */
    protected function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/xecdapi.php', 'xecdapi');
    }
}
