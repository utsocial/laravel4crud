<?php
namespace App\Providers;

use App\Services\User\UserViewService;
use App\Services\Contracts\UserViewServiceInterface;

use Illuminate\Support\ServiceProvider;

/**
 * Used to inject the dependencies of user service class
 */
class UserViewServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Contracts\UserViewServiceInterface', function() {
            return new UserViewService();
        });
    }
}
