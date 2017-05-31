<?php

namespace Forum\Providers;

use Forum\Policies\ThreadPolicy;
use Forum\Thread;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Thread::class => ThreadPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::before( function ($user){
	        if($user->name === 'Michael Hopkins') return true;
        });
    }
}
