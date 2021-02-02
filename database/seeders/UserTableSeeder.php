<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => "Admin",
            'email' => 'admin@admin.com',
            'role_id' => '1',
            'password' => bcrypt('superadmin')],

            ['name' => "Test",
            'email' => 'test@test.com',
            'role_id' => '2',
            'password' => bcrypt('supertest1')],
            ]); 
    }
}
