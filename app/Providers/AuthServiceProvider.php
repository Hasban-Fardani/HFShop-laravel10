<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Auth\Access\Gate;
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
        Gate::define("admin", function (User $user) {
            return $user->role == "admin";
        });

        Gate::define("admin-crud", function (User $user) {
            return !is_null($user->city_id) &&
                !is_null($user->address) &&
                $user->role == "admin";
        });

        Gate::define("buy", function (User $user) {
            return !is_null($user->city_id) &&
                !is_null($user->address) &&
                $user->role == "user";
        });

    }
}
