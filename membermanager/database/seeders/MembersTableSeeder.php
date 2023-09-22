<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'id' => 1,
                'name' => 'Phillip Olalere',
                'email' => 'phil.olalere@gmail.com',
                'school_id' => 1,
                'created_at' => '2023-09-22 07:31:44',
                'updated_at' => '2023-09-22 07:31:44',
            ],
            [
                'id' => 2,
                'name' => 'Joshson Fresh',
                'email' => 'phil.olalere@gmail.com',
                'school_id' => 2,
                'created_at' => '2023-09-22 07:50:40',
                'updated_at' => '2023-09-22 07:50:40',
            ],
        ]);
    }
}