<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTranslationsTable extends Migration
{
    public function up()
    {
        Schema::create('product_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('object_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('specification')->nullable();
            $table->string('language_code');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_translations');
    }
}
