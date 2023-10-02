<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;



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
        Gate::before(function ( $user, $permission) {

            if ($user->hasRole('admin') ?? false) {
                return true;
            }

            $permissions = Permission::where('name', $permission)->get();

            if ($permissions->count() == 0) {
                Permission::create(['name' => $permission]);
            }

            return $user->hasPermissionTo($permission);
        });
    }
}
