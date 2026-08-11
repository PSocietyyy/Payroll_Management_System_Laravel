<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate([
            "name" => "admin",
            "email" => "admin@example.test",
            "password" => Hash::make("password")
        ]);
        $admin->assignRole("SUPER_ADMIN");

        $hrAdmin = User::firstOrCreate([
            "name" => "hr_admin",
            "email" => "hr_admin@example.test",
            "password" => Hash::make("password")
        ]);
        $hrAdmin->assignRole("HR_ADMIN");

        $managerIT = User::firstOrCreate([
            "name" => "manager IT",
            "email" => "manager_IT@example.test",
            "password" => Hash::make("password")
        ]);
        $managerIT->assignRole("MANAGER");

        $managerFinance = User::firstOrCreate([
            "name" => "manager Finance",
            "email" => "manager_Finance@example.test",
            "password" => Hash::make("password")
        ]);
        $managerFinance->assignRole("MANAGER");

        $employee = User::firstOrCreate([
            "name" => "employee",
            "email" => "employee@example.test",
            "password" => Hash::make("password")
        ]);
        $employee->assignRole("EMPLOYEE");

        $employee2 = User::firstOrCreate([
            "name" => "employee2",
            "email" => "employee2@example.test",
            "password" => Hash::make("password")
        ]);
        $employee2->assignRole("EMPLOYEE");
    }
}
