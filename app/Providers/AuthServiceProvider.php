<?php

namespace App\Providers;

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

        Gate::define('isAdmin', function($user) {
            return $user->role == '1';
         });
         Gate::define('isUser', function($user) {
            return $user->role == '2';
         });


         Gate::define('isCustomer', function($user) {
             return $user->role == '3';
         });

        //  Gate::define('isUser', function($user) {
        //     return $user->role == '4';
        // });

    }
}