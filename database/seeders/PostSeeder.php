<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run()
    {
        DB::unprepared(file_get_contents(base_path().'/database/seeders/sql/posts.sql'));
    }
}
