<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\RolePolicy;
use App\Services\DefinePolicies;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

        $definePolicy = new DefinePolicies();

        $definePolicy->roleDefine();
        $definePolicy->permissionDefine();
        $definePolicy->levelDefine();
        $definePolicy->roomDefine();
        $definePolicy->specialistDefine();
        $definePolicy->adminDefine();
        $definePolicy->userDefine();

    }
}
