<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('if_admin', fn(User $user)=> $user->hasRole('admin'));
        Gate::define('if_moderator', fn(User $user)=> $user->hasRole('moderator'));

        Gate::before (function($user,$ability) {
          if($user->hasRole('admin')) {
            return true;
          }
        });
    }
}
