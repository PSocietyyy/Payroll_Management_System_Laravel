<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            "SUPER_ADMIN",
            "HR_ADMIN",
            "MANAGER",
            "EMPLOYEE",
        ];
        $permissions = [
            "employee.view",
            "employee.create",
            "employee.update",
            "employee.delete",

            "payroll.view",
            "payroll.calculate",
            "payroll.approve",
            "payroll.pay",

            "salary.view",
            "salary.update",

            "report.view",
            "report.generate",
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // memberikan permission ke role SUPER_ADMIN
        $superAdminRole = Role::where('name', 'SUPER_ADMIN')->first();
        if($superAdminRole) {
            $superAdminRole->givePermissionTo($permissions);
        }

        // memberikan permission ke role HR_ADMIN
        $hrAdminRole = Role::where('name', 'HR_ADMIN')->first();
        if($hrAdminRole) {
            $hrAdminRole->givePermissionTo([
                "employee.view",
                "employee.create",
                "employee.update",

                "payroll.view",
                "payroll.calculate",
                "payroll.approve",
                "payroll.pay",

                "salary.view",
                "salary.update",

                "report.view",
                "report.generate",
            ]);
        }

        // memberikan permission ke role MANAGER
        $managerRole = Role::where('name', 'MANAGER')->first();
        if($managerRole) {
            $managerRole->givePermissionTo([
                "employee.view",
                "employee.create",
                "employee.update",
                "employee.delete",

                "payroll.view",
                "payroll.calculate",
                "payroll.approve",
                "payroll.pay",

                "salary.view",
                "salary.update",

                "report.view",
                "report.generate",
            ]);
        }

        // memberikan permission ke role EMPLOYEE
        $employeeRole = Role::where('name', 'EMPLOYEE')->first();
        if($employeeRole) {
            $employeeRole->givePermissionTo([
                "payroll.view",
                "salary.view",
            ]);
        }
    }
}
