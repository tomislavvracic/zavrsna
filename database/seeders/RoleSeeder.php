<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'name' => "superadmin",
            "description" => "Can see all users. Can add users, update and delete every user except himself. Can add pages, edit and delete every page. Can change roles (admin/user)"
        ],
        [
            'name' => "admin",
            "description" => "Can see all users except superadmin. Can add users, update and delete every user except superadmin. Can add pages, edit and delete every page except superadmin. Can't change roles (admin/user)"
        ],
        [
            'name' => "user",
            "description" => "Can't see registered users. Can add pages, edit and delete only his pages"
        ]]);
    }
}
