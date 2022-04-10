<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagePhrasesTable extends Migration
{
    public function up()
    {
        Schema::create('page_phrases', function (Blueprint $table) {
            $table->id();
            $table->integer('page_id');
            $table->integer('phrase_id');
            $table->unique(['page_id','phrase_id'], 'page_phrase_unique');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_phrases');
    }
}
