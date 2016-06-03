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
use App\Imi;
use App\Policies\ImiPolicy;
use App\Acap;
use App\Policies\AcapPolicy;
use App\Icai;
use App\Policies\IcaiPolicy;
use App\ProjectComment;
use App\Policies\ProjectCommentPolicy;
use App\Consultation;
use App\Policies\ConsultationPolicy;
use App\Appointment;
use App\Policies\AppointmentPolicy;

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
        Canvas::class => CanvasPolicy::class,
        Imi::class => ImiPolicy::class,
        Acap::class => AcapPolicy::class,
        Icai::class => IcaiPolicy::class,
        ProjectComment::class => ProjectCommentPolicy::class,
        Consultation::class => ConsultationPolicy::class,
        Appointment::class => AppointmentPolicy::class
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
