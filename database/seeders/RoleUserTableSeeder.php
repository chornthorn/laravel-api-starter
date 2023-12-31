<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $superAdminRole = Role::where('name', 'super_admin')->first();

        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $user = User::create([
            'first_name' => 'User',
            'last_name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $superAdmin = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
        $superAdmin->roles()->attach($superAdminRole);
    }
}
