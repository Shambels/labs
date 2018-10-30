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

        Gate::define('is-admin', function($user) {
          if($user->roles_id == 1){
            return true;
          } else {
            return false;
          }
        });
        Gate::define('is-editor', function($user) {
          if($user->roles_id == 2){
            return true;
          } else {
            return false;
          }
        });
        Gate::define('is-author', function ($post) {
          if(Auth::user()->id == $post->user->id) {
            return true;
          } else {
            return false;
          }
      });
    }
}
