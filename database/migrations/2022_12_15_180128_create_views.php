<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateViews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(file_get_contents(base_path().'/database/views/create_phrases_view.sql'));
        DB::statement(file_get_contents(base_path().'/database/views/create_categories_view.sql'));
        DB::statement(file_get_contents(base_path().'/database/views/create_posts_view.sql'));
        DB::statement(file_get_contents(base_path().'/database/views/create_product_view.sql'));
        DB::statement(file_get_contents(base_path().'/database/views/create_product_categories_view.sql'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement(file_get_contents(base_path().'/database/views/drop_phrases_view.sql'));
        DB::statement(file_get_contents(base_path().'/database/views/drop_categories_view.sql'));
        DB::statement(file_get_contents(base_path().'/database/views/drop_posts_view.sql'));
        DB::statement(file_get_contents(base_path().'/database/views/drop_product_view.sql'));
        DB::statement(file_get_contents(base_path().'/database/views/drop_product_categories_view.sql'));

    }
}
