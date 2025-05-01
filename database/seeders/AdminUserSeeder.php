<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Get the admin role ID
        $adminRoleId = DB::table('roles')->where('name', 'admin')->value('id');

        // Associate the admin user with the admin role
        DB::table('role_user')->insert([
            'user_id' => $admin->id,
            'role_id' => $adminRoleId,
        ]);
    }
}
