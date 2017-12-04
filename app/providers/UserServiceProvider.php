<?php
namespace App\Providers;

use App\Services\User\UserService;
use App\Repositories\UserRepository;
use User;

use Illuminate\Support\ServiceProvider;

/**
 * Used to inject the dependencies of user service class
 */
class UserServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Contracts\UserServiceInterface', function($app) {
            $userRepository = $app->make('App\Repositories\UserRepository');
            return new UserService($userRepository);
        });
    }
}
