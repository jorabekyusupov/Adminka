<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoryTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('product_category_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('object_id');
            $table->string('language_code');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_category_translations');
    }
}
