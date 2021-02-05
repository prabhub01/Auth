<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bus_types')->insert([
            ['bus_type' => "Deluxe"],
            ['bus_type' => "Semi Deluxe"],
            ['bus_type' => "AC"],
            ['bus_type' => "Full Ac"]]);
             }
    }

