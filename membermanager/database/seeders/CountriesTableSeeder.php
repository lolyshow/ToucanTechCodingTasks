<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'id' => 1,
                'country_name' => 'United Kingdom',
                'created_at' => '2023-09-21 22:11:52',
                'updated_at' => '2023-09-21 22:11:52',
            ],
            [
                'id' => 2,
                'country_name' => 'Nigeria',
                'created_at' => '2023-09-21 22:12:00',
                'updated_at' => '2023-09-21 22:12:00',
            ],
            [
                'id' => 3,
                'country_name' => 'USA',
                'created_at' => '2023-09-21 22:12:06',
                'updated_at' => '2023-09-21 22:12:06',
            ],
        ]);
    }
}