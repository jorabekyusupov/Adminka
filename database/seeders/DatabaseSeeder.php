<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $pass = 'admin1234';
        $pass = bcrypt($pass);

        DB::unprepared("insert into users (username,email,password) values ('superadmin','superadmin@gmail.com','$pass')");
    }
}
