<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Make Role
        $role_admin = Role::create(['name' => 'admin']);
        $role_standard = Role::create(['name' => 'standard']);

        //Make Permission
        $permission_read = Permission::create(['name' => 'read']);
        $permission_edit = Permission::create(['name' => 'edit']);
        $permission_view = Permission::create(['name' => 'view']);
        $permission_delete = Permission::create(['name' => 'delete']);


        //Combine Permission to Admin
        $permission_admin = [  $permission_read, $permission_edit, $permission_view,  $permission_delete];


        //GivePermission
        $role_admin->syncPermissions($permission_admin);
        $role_standard->givePermissionTo($permission_read);
    
    }
}
