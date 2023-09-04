<?php

namespace App\Providers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
// use Illuminate\Support\Facades\Gate;
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
        // Permission::create(['name' => 'create items']);
        // Permission::create(['name' => 'edit items']);
        // Permission::create(['name' => 'delete items']);
        // Role::create(['name' => 'admin'])->givePermissionTo(['create items', 'edit items','delete items']);
        // Role::create(['name' => 'editor'])->givePermissionTo(['create items', 'edit items']);
    }
}
