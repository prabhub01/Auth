<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use\App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     ['name' => "Admin",
        //     'email' => 'admin@admin.com',
        //     'password' => bcrypt('superadmin')]
        //     ]); 

        $user = User::create([
        	'name' => 'Admin', 
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('superadmin')
        ]);
  
            $user->assignRole(1);
    }
}
