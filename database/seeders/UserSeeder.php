<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'first_name' => "Super",
            'last_name' => "Admin",
            'phone' => "099365885",
            'role_id' => 1,
            'email' => "admin@mail.com",
            'password' => Hash::make('11111111'),
        ]]);
    }
}
