<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data for the "schools" table
        $schools = [
            [
                'id' => 1,
                'school_name' => 'University of Hull',
                'country_id' => 1,
                'created_at' => '2023-09-22 07:02:41',
                'updated_at' => '2023-09-22 07:02:41',
            ],
            [
                'id' => 2,
                'school_name' => 'American University',
                'country_id' => 3,
                'created_at' => '2023-09-22 07:02:54',
                'updated_at' => '2023-09-22 07:02:54',
            ],
            [
                'id' => 3,
                'school_name' => 'Oxford University',
                'country_id' => 1,
                'created_at' => '2023-09-22 07:03:20',
                'updated_at' => '2023-09-22 07:03:20',
            ],
            // Add more school data as needed
        ];

        // Insert the data into the "schools" table
        DB::table('schools')->insert($schools);
    }
}