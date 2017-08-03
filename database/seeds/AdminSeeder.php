<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'izzudin anuar',
            'email' => 'azuxies@gmail.com',
            'password' => bcrypt('asd123'),
            'role' => 3,
        ]);
    }
}
