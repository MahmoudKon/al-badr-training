<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        /**
         * get the array of permissions from config at global file
         * Then define the gate and pass parameter to method that at Model
         */
        foreach( Config('global.permissions') as $ability => $value){
            Gate::define($ability, function($auth) use ($ability){
                return $auth->hasAbility($ability);
            });
        }
    }
}
