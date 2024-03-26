<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $writer = User::create([
            'name' => 'writer',
            'email' => 'writer@writer.com',
            'password' => bcrypt('password')
        ]);


        $admin_role = Role::create(['name' => 'admin']);
        $writer_role = Role::create(['name' => 'writer']);

        Permission::create(['name' => 'Post access']);
        Permission::create(['name' => 'Post edit']);
        Permission::create(['name' => 'Post create']);
        Permission::create(['name' => 'Post delete']);

        Permission::create(['name' => 'Role access']);
        Permission::create(['name' => 'Role edit']);
        Permission::create(['name' => 'Role create']);
        Permission::create(['name' => 'Role delete']);

        Permission::create(['name' => 'User access']);
        Permission::create(['name' => 'User edit']);
        Permission::create(['name' => 'User create']);
        Permission::create(['name' => 'User delete']);

        Permission::create(['name' => 'Permission access']);
        Permission::create(['name' => 'Permission edit']);
        Permission::create(['name' => 'Permission create']);
        Permission::create(['name' => 'Permission delete']);

        Permission::create(['name' => 'Product access']);
        Permission::create(['name' => 'Product edit']);
        Permission::create(['name' => 'Product create']);
        Permission::create(['name' => 'Product delete']);

        Permission::create(['name' => 'Category access']);
        Permission::create(['name' => 'Category edit']);
        Permission::create(['name' => 'Category create']);
        Permission::create(['name' => 'Category delete']);

        Permission::create(['name' => 'ApiProduct access']);
        Permission::create(['name' => 'ApiOrder access']);


        Permission::create(['name' => 'Mail access']);
        Permission::create(['name' => 'Mail edit']);

        $admin->assignRole($admin_role);
        $writer->assignRole($writer_role);


        $admin_role->givePermissionTo(Permission::all());
    }
}
