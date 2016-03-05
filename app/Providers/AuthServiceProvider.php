<?php

namespace App\Providers;

use App\Project;
use App\Policies\ProjectPolicy;
use App\Company;
use App\Policies\CompanyPolicy;
use App\User;
use App\Policies\UserPolicy;
use App\Canvas;
use App\Policies\CanvasPolicy;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
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
        Project::class => ProjectPolicy::class,
        Company::class => CompanyPolicy::class,
        User::class => UserPolicy::class,
        Canvas::class => CanvasPolicy::class
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
    }
}
