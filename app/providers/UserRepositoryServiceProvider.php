<?php
namespace App\Providers;

use App\Repositories\UserRepository;

use Illuminate\Support\ServiceProvider;
use User;

/**
 * Used to bind dependencies on UserRepository class
 */
class UserRepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $app = $this->app;
        
        $app->bind('App\Repositories\Contracts\UserRepositoryInterface', function() {
            $user = new User();
            return new UserRepository(
                $user
            );
        });
    }
}