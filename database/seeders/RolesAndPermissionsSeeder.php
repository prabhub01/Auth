<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;



class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

       // create permissions
       Permission::create(['name' => 'register']);
       Permission::create(['name' => 'login']);
       Permission::create(['name' => 'view-role-user-page']);
       Permission::create(['name' => 'manage-user']);
       Permission::create(['name' => 'manage-role']);
       Permission::create(['name' => 'edit-agent']);
       Permission::create(['name' => 'delete-agent']);
       Permission::create(['name' => 'add-bus']);
       Permission::create(['name' => 'edit-bus']);
       Permission::create(['name' => 'delete-bus']);
       Permission::create(['name' => 'add-route']);
       Permission::create(['name' => 'edit-route']);
       Permission::create(['name' => 'delete-route']);
       Permission::create(['name' => 'reservation']);
       Permission::create(['name' => 'view-reservation']);
       Permission::create(['name' => 'delete-reservation']);
       Permission::create(['name' => 'confirm-tickets']);

       // creating roles and giving them permissions by chaining
       $role = Role::create(['name' => 'admin'])
           ->givePermissionTo(['login', 'manage-user', 'manage-role', 'edit-agent', 'delete-agent', 
           'add-bus', 'edit-bus', 'delete-bus', 'add-route', 'edit-route', 'delete-route', 'view-reservation','view-role-user-page']);
            
       $role = Role::create(['name' => 'agent'])
           ->givePermissionTo(['register', 'login', 'edit-bus', 'add-route', 'edit-route', 'view-reservation', 'delete-reservation', 'confirm-tickets']);
        }
    }
