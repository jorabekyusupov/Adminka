<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhrasesTable extends Migration
{
    public function up()
    {
        Schema::create('phrases', function (Blueprint $table) {
            $table->id();
            $table->string('word',100)->unique();
            $table->integer('page_id')->nullable();
            $table->index('page_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('phrases');
    }
}
