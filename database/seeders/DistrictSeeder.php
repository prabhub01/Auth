<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            ['state_id' => "1",
            'district_name' => 'Mechi'],
            ['state_id' => "1",
            'district_name' => 'Bhojpur'],
            ['state_id' => "2",
            'district_name' => 'Dhanusha'],
            ['state_id' => "2",
            'district_name' => 'Siraha'],
            ['state_id' => "3",
            'district_name' => 'kathamndu'],
            ['state_id' => "3",
            'district_name' => 'Bhaktapur'],]);
    }
}
