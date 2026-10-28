<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate; // Important: Make sure this is imported

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // Example if you had a UserPolicy:
        // \App\Models\User::class => \App\Policies\UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // This is where you will define your Gates
        // Based on your previous code, you'd add:
        Gate::define('access-admin-index', function ($user) { // Or 'access-admin-index' as per your example
            return $user->role === 'admin';
        });

        // Add any other Gates or policies here
    }
}