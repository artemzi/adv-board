<?php

namespace Board\Providers;

use App\Services\Sms\SmsRu;
use App\Services\Sms\SmsSender;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->singleton(SmsSender::class, function (Application $app) {
            $config = $app->make('config')->get('sms');
            if (!empty($config['url'])) {
                return new SmsRu($config['app_id'], $config['url']);
            }
            return new SmsRu($config['app_id']);
        });
    }
}
