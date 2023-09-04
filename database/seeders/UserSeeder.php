<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'email_verified_at'=>now(),
            'password'=>Hash::make('adminpassword')
        ])->assignRole('admin')->givePermissionTo(['create items','edit items','delete items']);

  

    }
}
