<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run(): void
    {
        // Resetting cached roles and permissions, because otherwise we won't see updates in the application. 
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        //Permissions
        Permission::create(['name' => 'create news', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit news', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete news', 'guard_name' => 'web']);
        Permission::create(['name' => 'archive news', 'guard_name' => 'web']);
        Permission::create(['name' => 'create faq', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit faq', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete faq', 'guard_name' => 'web']);
        Permission::create(['name' => 'archive faq', 'guard_name' => 'web']);
        Permission::create(['name' => 'respond contact', 'guard_name' => 'web']);
        Permission::create(['name' => 'archive contact', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete contact', 'guard_name' => 'web']);
        Permission::create(['name' => 'update role', 'guard_name' => 'web']);

      

        //Roles
        $user = Role::create(['name' => 'user']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('create news');
        $admin->givePermissionTo('edit news');  
        $admin->givePermissionTo('delete news');
        $admin->givePermissionTo('archive news');
        $admin->givePermissionTo('create faq');
        $admin->givePermissionTo('edit faq');
        $admin->givePermissionTo('delete faq');
        $admin->givePermissionTo('archive faq');

        $owner = Role::create(['name' => 'owner']);
        $owner->givePermissionTo('create news');
        $owner->givePermissionTo('edit news');  
        $owner->givePermissionTo('delete news');
        $owner->givePermissionTo('archive news');
        $owner->givePermissionTo('create faq');
        $owner->givePermissionTo('edit faq');
        $owner->givePermissionTo('delete faq');
        $owner->givePermissionTo('archive faq');
        $owner->givePermissionTo('respond contact');
        $owner->givePermissionTo('archive contact');
        $owner->givePermissionTo('delete contact');
        $owner->givePermissionTo('update role');


        $ehbUser = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => 'Password!321',
        ]);
        $ehbUser->assignRole($owner);

    }
}
