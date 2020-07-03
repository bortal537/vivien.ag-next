<?php

namespace App\Providers;

use App\Policies\SessionPolicy;
use App\Policies\UserPolicy;
use App\Session;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
         Session::class => SessionPolicy::class,
         User::class => UserPolicy::class,
    ];

    final public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
