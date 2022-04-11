<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $pass = 'admin1234';
        $pass = bcrypt($pass);

        DB::unprepared("insert into users (username,email,password) values ('superadmin','superadmin@gmail.com','$pass')");
    }
}
