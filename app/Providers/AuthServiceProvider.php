<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\About' => 'App\Policies\AboutPolicy',
        'App\Models\Portfolio' => 'App\Policies\PortfolioPolicy',
        'App\Models\Price' => 'App\Policies\PricePolicy',
        'App\Models\Review' => 'App\Policies\ReviewPolicy',
        'App\Models\Service' => 'App\Policies\ServicePolicy',
        'App\Models\Skill' => 'App\Policies\SkillPolicy',
        'App\Models\Team' => 'App\Policies\TeamPolicy'
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       	Gate::define('VIEW_ADMIN', function($user) {
       		return $user->canDo('VIEW_ADMIN');
       	});

       	Gate::define('CHANGE_PERMISSIONS', function($user) {
       		return $user->canDo('CHANGE_PERMISSIONS');
       	});
    }
}
