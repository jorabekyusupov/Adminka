<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::unprepared(file_get_contents(base_path().'/database/seeders/sql/categories.sql'));
    }
}
