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

        $manager = User::create([
            'name' => 'Manager',
            'email' => 'manager@manager.com',
            'password' => bcrypt('password')
        ]);


        $admin_role = Role::create(['name' => 'admin']);
        $manager_role = Role::create(['name' => 'manager']);

        Permission::create(['name' => 'Toegang tot rollen']);
        Permission::create(['name' => 'Rol bewerken']);
        Permission::create(['name' => 'Rol maken']);
        Permission::create(['name' => 'Rol verwijderen']);

        Permission::create(['name' => 'Toegang tot gebruikers']);
        Permission::create(['name' => 'Gebruiker bewerken']);
        Permission::create(['name' => 'Gebruiker maken']);
        Permission::create(['name' => 'Gebruiker verwijderen']);

        Permission::create(['name' => 'Toegang tot toestemmingen']);
        Permission::create(['name' => 'Toestemming bewerken']);
        Permission::create(['name' => 'Toestemming maken']);
        Permission::create(['name' => 'Toestemming verwijderen']);

        Permission::create(['name' => 'Toegang tot producten']);
        Permission::create(['name' => 'Product bewerken']);
        Permission::create(['name' => 'Product maken']);
        Permission::create(['name' => 'Product verwijderen']);

        Permission::create(['name' => 'Toegang tot typen']);
        Permission::create(['name' => 'Type bewerken']);
        Permission::create(['name' => 'Type maken']);
        Permission::create(['name' => 'Type verwijderen']);

        Permission::create(['name' => 'ApiProducten toegang']);
        Permission::create(['name' => 'ApiBestellingen toegang']);


        // Permission::create(['name' => 'Mail access']);
        // Permission::create(['name' => 'Mail edit']);

        $admin->assignRole($admin_role);
        $manager->assignRole($manager_role);


        $admin_role->givePermissionTo(Permission::all());
    }
}
