<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use app\models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerPermissions();

        //
    }

    private function registerPermissions(): void
    {
        Gate::define('admin-panel', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });
        Gate::define('manage-users', function (User $user) {
            return $user->isAdmin() || $user->isModerator();
        });
        Gate::define('manage-regions', function (User $user) {
            return $user->isAdmin();
        });
    }
}
