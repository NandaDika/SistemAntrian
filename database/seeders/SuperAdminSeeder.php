<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate([
            'name' => 'SUPER_ADMIN'
        ]);

        $user = User::updateOrCreate(
            [
                'username' => 'SuperAdmin'
            ],
            [
                'full_name' => 'Super Administrator',
                'password' => Hash::make('admin12345'),
                'is_active' => true,
            ]
        );

        $user->assignRole($role);
    }
}
