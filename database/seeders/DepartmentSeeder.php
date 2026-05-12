<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            [
                'code' => 'REG',
                'name' => 'Registrasi',
                'queue_prefix' => 'A',
                'room_name' => 'Loket Registrasi',
                'is_registration' => true,
                'is_payment_gateway' => true,
            ],
            [
                'code' => 'POLI',
                'name' => 'Poli Umum',
                'queue_prefix' => 'B',
                'room_name' => 'Ruang Poli Umum',
            ],
            [
                'code' => 'LAB',
                'name' => 'Laboratorium',
                'queue_prefix' => 'C',
                'room_name' => 'Ruang Laboratorium',
            ],
            [
                'code' => 'APT',
                'name' => 'Apotek',
                'queue_prefix' => 'D',
                'room_name' => 'Ruang Apotek',
            ],
        ];

        foreach ($departments as $department) {
            Department::updateOrCreate(
                ['code' => $department['code']],
                $department
            );
        }
    }
}
