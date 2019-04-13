<?php

namespace App\Providers;

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

        $this->registerPostPolicies();
    }

    public function registerPostPolicies()
    {
        //-- DASHBOARD --//
        Gate::define('show-dashboard', function ($user) {
            return $user->hasAccess(['show-dashboard']);
        });
        //-- VISI & MISI --//
        Gate::define('browse-visi_misi', function ($user) {
            return $user->hasAccess(['browse-visi_misi']);
        });
        Gate::define('add-visi_misi', function ($user) {
            return $user->hasAccess(['add-visi_misi']);
        });
        Gate::define('edit-visi_misi', function ($user) {
            return $user->hasAccess(['edit-visi_misi']);
        });
        Gate::define('delete-visi_misi', function ($user) {
            return $user->hasAccess(['delete-visi_misi']);
        });
        //-- TUJUAN --//
        Gate::define('browse-tujuan', function ($user) {
            return $user->hasAccess(['browse-tujuan']);
        });
        Gate::define('add-tujuan', function ($user) {
            return $user->hasAccess(['add-tujuan']);
        });
        Gate::define('edit-tujuan', function ($user) {
            return $user->hasAccess(['edit-tujuan']);
        });
        Gate::define('delete-tujuan', function ($user) {
            return $user->hasAccess(['delete-tujuan']);
        });
        //-- USER --//
        Gate::define('browse-user', function ($user) {
            return $user->hasAccess(['browse-user']);
        });
        Gate::define('add-user', function ($user) {
            return $user->hasAccess(['add-user']);
        });
        Gate::define('edit-user', function ($user) {
            return $user->hasAccess(['edit-user']);
        });
        Gate::define('delete-user', function ($user) {
            return $user->hasAccess(['delete-user']);
        });
    }
}
