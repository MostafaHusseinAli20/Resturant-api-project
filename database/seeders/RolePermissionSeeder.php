<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    private $permissions = [
        'create_customer',
        'read_customer',
        'update_customer',
        'delete_customer',

        'create_role',
        'read_role',
        'update_role',
        'delete_role',

        'read_category',
        'create_category',
        'update_category',
        'delete_category',

        'read_menu_item',
        'create_menu_item',
        'update_menu_item',
        'delete_menu_item',

        'read_order',
        'show_order',
        'create_order',
        'update_order',
        'delete_order',

        'notifications',
     ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'admin']);
        }

        $admin = Admin::create([
            'name' => 'Super Admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123456789'),
            'roles_name' => json_encode(['super_admin']),
        ]);

        $role = Role::create(['name' => 'super_admin', 'guard_name' => 'admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $admin->assignRole([$role->id]);
    }
}
