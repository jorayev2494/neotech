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

        $user = \App\User::find(5);
        // dd($user->roles[0]->title);


        /*Gate::define('add-post', function ($user) {
            foreach($user->roles as $role){
        if($role->name == 'admin') return true; 
            }
            return false;
        });*/        

        // dd($user);
        // dd(User::class);

        Gate::define('admin', function ($user) {
            // dd($user->roles);
            foreach($user->roles as $role){
                // dump($role);
                if($role->title == 'admin') {
                    return true;
                }
            }
            return false;
        });
    }
}
