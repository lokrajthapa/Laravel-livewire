<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create items']);
        Permission::create(['name' => 'edit items']);
        Permission::create(['name' => 'delete items']);
        Role::create(['name' => 'admin'])->givePermissionTo(['create items', 'edit items','delete items']);
        Role::create(['name' => 'editor'])->givePermissionTo(['create items', 'edit items']);
         
        $this->call(UserSeeder::class);
        
    }
}
