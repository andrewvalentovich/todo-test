<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Planner;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('show-planner', function (User $user, Planner $planner) {
            return auth()->user()->getAuthIdentifier() === $planner->author->id;
        });


        Gate::define('show-roles-read', function (User $user, Planner $planner) {
            if (isset($user->role->name)) {
                return $user->role->name === 'read';
            } else {
                return false;
            }
        });

        Gate::define('show-roles-edit', function (User $user) {
            if (isset($user->role->name)) {
                return $user->role->name === 'edit';
            } else {
                return false;
            }
        });
    }
}
