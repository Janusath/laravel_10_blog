<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Blade::directive('passwordTimeout', function () {
            return "<?php if (Auth::check() && (time() - Auth::user()->password_confirmed_at > config('auth.password_timeout'))) { Auth::logout(); return redirect(\$this->getLoginRoute()); } ?>";
        });
    }

    protected function getLoginRoute()
    {
        $guard = Auth::getDefaultDriver();

        switch ($guard) {
            case 'admin_user':
                return route('admin_login');
                break;
            case 'entrepreneur':
                return route('entrepreneur_login');
                break;
            default:
                return route('login');
                break;
        }
    }
}
