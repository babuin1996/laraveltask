<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerUserPolicies();
    }

    public function registerUserPolicies()
    {
        Gate::define('create-user', function ($user) {
            return $user->hasAccess(['create-user']);
        });

        Gate::define('read-user', function ($user) {
            return $user->hasAccess(['read-user']);
        });

        Gate::define('update-user', function ($user) {
            return $user->hasAccess(['update-user']);
        });

        Gate::define('delete-user', function ($user) {
            return $user->hasAccess(['delete-user']);
        });
    }
}
