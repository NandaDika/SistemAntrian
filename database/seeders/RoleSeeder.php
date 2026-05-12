<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'SUPER_ADMIN',
            'CASHIER',
            'DEPARTMENT_ADMIN',
            'DISPLAY_OPERATOR',
            'KIOSK_OPERATOR',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate([
                'name' => $role,
            ]);
        }
    }
}
