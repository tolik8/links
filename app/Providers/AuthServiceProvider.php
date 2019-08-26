<?php

namespace App\Providers;

use App\Group;
use App\Policies\GroupPolicy;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Group::class => GroupPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /*Gate::define('edit-group', function ($user, $group) {
            return $user->id == $group->user_id;
        });*/
        Gate::define('group-edit', 'App\Policies\GroupPolicy@edit');
    }
}
