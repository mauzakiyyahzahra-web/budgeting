<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(array(
            array(
                'name' => 'mauzakiyyah',
                'email' => 'zakiyy@gmail.com',
                'password' => bcrypt('123456'),
            ),
              array(
                'name' => 'ardelia',
                'email' => 'ardelia@gmail.com',
                'password' => bcrypt('123456'),
            )
        ));
    }
}